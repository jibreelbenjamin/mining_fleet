<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\User;
use App\Models\Approval;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingListController extends Controller
{
    protected $model = Booking::class;
    protected $route = 'dashboard.booking-list';
    protected $view = 'app.booking-list';
    protected $primary = 'id_booking';
    protected $echo = 'booking';
    protected $page = 'booking-list';

    protected $rules = [
        'requested_by' => 'required|integer',
        'vehicle_id' => 'required|integer',
        'driver_id' => 'required|integer',
        'tujuan' => 'required|string|max:255',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
    ];
    protected $messages = [
        'requested_by.required' => 'Pegawai pemesan wajib dipilih',
        'requested_by.integer' => 'Pegawai pemesan tidak valid',

        'vehicle_id.required' => 'Kendaraan wajib dipilih',
        'vehicle_id.integer' => 'Kendaraan tidak valid',

        'driver_id.required' => 'Driver wajib dipilih',
        'driver_id.integer' => 'Driver tidak valid',

        'tujuan.required' => 'Tujuan wajib diisi',
        'tujuan.max' => 'Tujuan maksimal 255 karakter',

        'tanggal_mulai.required' => 'Tanggal mulai wajib diisi',
        'tanggal_mulai.date' => 'Format tanggal mulai tidak valid',

        'tanggal_selesai.required' => 'Tanggal selesai wajib diisi',
        'tanggal_selesai.date' => 'Format tanggal selesai tidak valid',
        'tanggal_selesai.after_or_equal' => 'Tanggal selesai tidak boleh sebelum tanggal mulai',
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');
        $search_keys = [
            'user.nama',
            'vehicle.nama_kendaraan',
            'driver.nama_driver',
            'tujuan',
            'tanggal_mulai',
            'tanggal_selesai',
            'status',
        ];

        $query = $this->model::query();

        $relations = [];
        foreach ($search_keys as $key) {
            if (str_contains($key, '.')) {
                $relation = explode('.', $key)[0];
                $relations[] = $relation;
            }
        }
        $query->with(array_unique($relations));
        
        if ($search) {
            $query->where(function($q) use ($search, $search_keys) {
                foreach ($search_keys as $key) {
                    if (str_contains($key, '.')) {
                        [$relation, $column] = explode('.', $key);
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
                    ->with(['approvals.approverUser'])
                    ->paginate(15)
                    ->withQueryString();
        return view($this->view.'.daftar', compact('data', 'search'));
    }

    public function destroy($id)
    {
        $data = $this->model::findOrFail($id);

        if ($data->status == 1) {
            $data->delete();
            return redirect()->route($this->route)
                            ->with(['successToast' => ucfirst($this->echo).' berhasil dihapus']);
        } else {
            return redirect()->route($this->route)
                            ->withErrors(['message' => ucfirst($this->echo).' tidak dapat dihapus']);
        }
    }
}
