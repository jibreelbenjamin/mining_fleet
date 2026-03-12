<?php

namespace App\Http\Controllers;

use App\Models\FuelLog;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FuelLogController extends Controller
{
    protected $model = FuelLog::class;
    protected $route = 'dashboard.fuel-log';
    protected $view = 'app.fuel-log';
    protected $primary = 'id_fuel_log';
    protected $echo = 'bahan bakar';
    protected $page = 'fuel-log';

    protected $rules = [
        'booking_id' => 'required|exists:bookings,id_booking',
        'liter' => 'required|numeric|min:0',
        'harga_per_liter' => 'required|numeric|min:0',
        'total' => 'required|numeric|min:0',
        'tanggal' => 'required|date',
    ];
    protected $messages = [
        'booking_id.required' => 'Booking wajib dipilih',
        'booking_id.exists' => 'Booking tidak valid',

        'liter.required' => 'Jumlah liter wajib diisi',
        'liter.numeric' => 'Liter harus berupa angka',
        'liter.min' => 'Liter tidak boleh kurang dari 0',

        'harga_per_liter.required' => 'Harga per liter wajib diisi',
        'harga_per_liter.numeric' => 'Harga per liter harus berupa angka',
        'harga_per_liter.min' => 'Harga per liter tidak boleh kurang dari 0',

        'total.required' => 'Total wajib diisi',
        'total.numeric' => 'Total harus berupa angka',
        'total.min' => 'Total tidak boleh kurang dari 0',

        'tanggal.required' => 'Tanggal wajib diisi',
        'tanggal.date' => 'Format tanggal tidak valid',
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

        $query = Booking::query();
        $query->where('requested_by', Auth::user()->id_user);
        $query->where('status', 2);

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

        $data = $query->orderBy('id_booking', 'desc')
                    ->with(['approvals.approverUser'])
                    ->paginate(15)
                    ->withQueryString();
        return view($this->view.'.daftar', compact('data', 'search'));
    }

    public function create($id_booking)
    {
        $data = Booking::with('fuelLogs')->find($id_booking);

        if($data && ($data->status == 2)){
            if($data->requested_by != Auth::user()->id_user){
                return redirect()->route($this->route)->withErrors(['message' => 'Pesanan invalid']);
            }
            return view($this->view.'.form', ['mode' => 'create'], compact('data'));

        } else {
            return redirect()->route($this->route)->withErrors(['message' => 'Pesanan tidak ditemukan']);
        }
    }

    public function store(Request $request, $id_booking)
    {
        $data = Booking::with('fuelLogs')->find($id_booking);

        if($data && ($data->status == 2)){
            if($data->requested_by != Auth::user()->id_user){
                return redirect()->route($this->route)->withErrors(['message' => 'Pesanan invalid']);
            }
            $request['booking_id'] = $id_booking;
            $validate = $request->validate($this->rules, $this->messages);
            $this->model::create($validate);
            return redirect()->back()->with(['successToast' => ucfirst($this->echo).' berhasil ditambahkan']);

        } else {
            return redirect()->route($this->route)->withErrors(['message' => 'Pesanan tidak ditemukan']);
        }
    }

    public function destroy($id_booking, $id)
    {
        $data = Booking::with('fuelLogs')->find($id_booking);

        if($data && ($data->status == 2)){
            if($data->requested_by != Auth::user()->id_user){
                return redirect()->route($this->route)->withErrors(['message' => 'Pesanan invalid']);
            }
            $this->model::findOrFail($id)->delete();
            return redirect()->back()->with(['successToast' => ucfirst($this->echo).' berhasil dihapus']);

        } else {
            return redirect()->route($this->route)->withErrors(['message' => 'Pesanan tidak ditemukan']);
        }
    }
}
