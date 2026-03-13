<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\User;
use App\Models\Approval;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    protected $model = Booking::class;
    protected $route = 'dashboard.booking';
    protected $view = 'app.booking';
    protected $primary = 'id_booking';
    protected $echo = 'booking';
    protected $page = 'booking';

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
        $query->where('requested_by', Auth::user()->id_user);

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

    public function create()
    {
        $vehicle = Vehicle::all();
        $driver = Driver::all();
        $supervisor = User::where('role', 'supervisor')->get();
        $manager = User::where('role', 'manager')->get();
        return view($this->view.'.form', ['mode' => 'create'], compact('vehicle', 'driver', 'supervisor', 'manager'));
    }

    public function store(Request $request)
    {
        $request['requested_by'] = Auth::user()->id_user;

        // Validasi Booking
        $validate = $request->validate($this->rules, $this->messages);
        $validate['status'] = 1;

        // Validasi approver
        $approver = $request->validate([
            'lvl1' => 'required|exists:users,id_user',
            'lvl2' => 'required|exists:users,id_user',
        ], [
            'lvl1.required' => 'Supervisor wajib dipilih',
            'lvl1.exists' => 'Supervisor tidak valid',
            'lvl2.required' => 'Manager wajib dipilih',
            'lvl2.exists' => 'Manager tidak valid',
        ]);
        $supervisor = User::find($request->lvl1);
        $manager = User::find($request->lvl2);

        if (!$supervisor || $supervisor->role !== 'supervisor') {
            return redirect()->back()->withErrors(['lvl1' => 'User yang dipilih bukan Supervisor']);
        }

        if (!$manager || $manager->role !== 'manager') {
            return redirect()->back()->withErrors(['lvl2' => 'User yang dipilih bukan Manager']);
        }

        $booking = $this->model::create($validate);

        // approval level 1 (supervisor)
        Approval::create([
            'booking_id' => $booking->id_booking,
            'approver' => $request->lvl1,
            'level' => 1,
            'status' => 1
        ]);

        // approval level 2 (manager)
        Approval::create([
            'booking_id' => $booking->id_booking,
            'approver' => $request->lvl2,
            'level' => 2,
            'status' => 1
        ]);

        logActivity('membuat '.$this->echo.' baru');
        return redirect()->route($this->route)->with(['successToast' => ucfirst($this->echo).' berhasil dibuat']);
    }

    public function done($id)
    {
        $data = $this->model::where($this->primary, $id)->firstOrFail();

        if($data && ($data->status == 2)){
            if($data->requested_by != Auth::user()->id_user){
                return redirect()->route($this->route)->withErrors(['message' => ucfirst($this->echo).' invalid']);
            }
            $data->status = 4;
            $data->save();

            return redirect()->route($this->route)->with(['successToast' => ucfirst($this->echo).' berhasil diselesaikan']);
        } else {
            return redirect()->route($this->route)->withErrors(['message' => ucfirst($this->echo).' tidak ditemukan']);
        }
    }

    public function destroy($id)
    {
        $data = $this->model::where($this->primary, $id)->firstOrFail();

        if($data && ($data->status == 1)){
            if($data->requested_by != Auth::user()->id_user){
                return redirect()->route($this->route)->withErrors(['message' => ucfirst($this->echo).' invalid']);
            }
            $data->delete();

            return redirect()->route($this->route)->with(['successToast' => ucfirst($this->echo).' berhasil dihapus']);
        } else {
            return redirect()->route($this->route)->withErrors(['message' => ucfirst($this->echo).' tidak ditemukan']);
        }
    }
}
