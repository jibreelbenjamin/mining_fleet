<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Approval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    protected $model = Approval::class;
    protected $route = 'dashboard.approval';
    protected $view = 'app.approval';
    protected $primary = 'id_approval';
    protected $echo = 'pertujuan';
    protected $page = 'approval';

    public function index(Request $request)
    {
        $search = $request->input('search');
        $search_keys = [
            'booking.user.nama',
            'booking.vehicle.nama_kendaraan',
            'booking.driver.nama_driver',
            'booking.tujuan',
            'booking.tanggal_mulai',
            'booking.tanggal_selesai',
            'booking.status',
            'booking_id',
        ];

        $user = Auth::user();
        $query = $this->model::query();
        $query->where('status', 1);

        if ($user->role == 'supervisor') {
            $query->where('approver', $user->id_user)
                ->where('level', 1)
                ->where('status', 1); // hanya pending level 1
        }
        if ($user->role == 'manager') {
            $query->where('approver', $user->id_user)
                ->where('level', 2)
                ->whereHas('booking.approvals', function($q){
                    $q->where('level', 1)
                        ->where('status', 2); // level 1 harus approved
                });
        }

        $relations = [];
        foreach ($search_keys as $key) {
            if (str_contains($key, '.')) {
                $relation = explode('.', $key)[0];
                $relations[] = $relation;
            }
        }
        $query->with([
            'booking.user',
            'booking.vehicle',
            'booking.driver',
            'approverUser'
        ]);
        if ($search) {
            $query->where(function($q) use ($search, $search_keys) {
                foreach ($search_keys as $key) {
                    if (str_contains($key, '.')) {
                        $parts = explode('.', $key);
                        $column = array_pop($parts);
                        $relation = implode('.', $parts);

                        $q->orWhereHas($relation, function($q2) use ($column, $search) {
                            $q2->where($column, 'ilike', "%{$search}%");
                        });
                    } else {
                        $q->orWhere($key, 'ilike', "%{$search}%");
                    }
                }
            });
        }

        $data = $query->orderBy($this->primary, 'desc')
                    ->paginate(15)
                    ->withQueryString();
        return view($this->view.'.daftar', compact('data', 'search'));
    }

    public function approve($id)
    {
        $approval = Approval::with('booking.approvals')->findOrFail($id);
        $user = Auth::user();

        // Validasi role
        if (!in_array($user->role, ['supervisor', 'manager'])) {
            return redirect()->back()->withErrors(['message' => 'Anda tidak berhak mengubah approval ini']);
        }

        // Validasi status pending
        if ($approval->status != 1) {
            return redirect()->back()->withErrors(['message' => 'Approval ini tidak dapat diubah']);
        }

        // Validasi approver
        if ($approval->approver != $user->id_user) {
            return redirect()->back()->withErrors(['message' => 'Anda bukan approver dari data ini']);
        }

        // Update status approve
        $approval->status = 2;
        $approval->save();
        logActivity('menyetujui approval');

        $approval->booking->load('approvals');
        $approvals = $approval->booking->approvals;

        // klo level 1 & level 2 approve > booking.status = 2
        $level1 = $approvals->where('level', 1)->first()?->status;
        $level2 = $approvals->where('level', 2)->first()?->status;

        if ($level1 == 2 && $level2 == 2) {
            $approval->booking->status = 2; // booking approved
            $approval->booking->save();

            if ($approval->booking->vehicle) {
                $approval->booking->vehicle->status = 2; // vehicle booked
                $approval->booking->vehicle->save();
            }
        }

        return redirect()->back()->with(['successToast' => 'Pesanan berhasil disetujui']);
    }

    public function reject($id)
    {
        $approval = Approval::with('booking.approvals')->findOrFail($id);
        $user = Auth::user();

        // Validasi role
        if (!in_array($user->role, ['supervisor', 'manager'])) {
            return redirect()->back()->withErrors(['message' => 'Anda tidak berhak mengubah approval ini']);
        }

        // Validasi status pending
        if ($approval->status != 1) {
            return redirect()->back()->withErrors(['message' => 'Approval ini tidak dapat diubah']);
        }

        // Validasi approver
        if ($approval->approver != $user->id_user) {
            return redirect()->back()->withErrors(['message' => 'Anda bukan approver dari data ini']);
        }

        // Update status reject
        $approval->status = 3;
        $approval->save();
        logActivity('menolak approval');

        $approvals = $approval->booking->approvals;

        // klo level 1 reject yh level 2 otomatis reject
        if ($approval->level == 1) {
            $level2 = $approvals->where('level', 2)->first();
            if ($level2 && $level2->status == 1) {
                $level2->status = 3;
                $level2->save();
            }
        }

        // reject
        $approval->booking->status = 3;
        $approval->booking->save();

        return redirect()->back()->with(['successToast' => 'Pesanan berhasil ditolak']);
    }
}
