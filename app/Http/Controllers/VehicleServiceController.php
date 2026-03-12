<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleService;
use Illuminate\Http\Request;

class VehicleServiceController extends Controller
{
    protected $model = VehicleService::class;
    protected $route = 'dashboard.vehicle-service';
    protected $view = 'app.vehicle-service';
    protected $primary = 'id_vehicle_service';
    protected $echo = 'servis kendaraan';
    protected $page = 'vehicle-service';

    protected $rules = [
        'vehicle_id' => 'required|string|max:255',
        'service_date' => 'required|string|max:255',
        'keterangan' => 'required|string|max:255',
        'cost' => 'required|string|max:255',
        'status' => 'required|int|in:1,2,3',
    ];
    protected $messages = [
        'nama_kendaraan.required' => 'Nama kendaraan wajib diisi',
        'nama_kendaraan.max' => 'Nama kendaraan maksimal 255 karakter',
        'jenis_kendaraan.required' => 'Nama kendaraan wajib diisi',
        'jenis_kendaraan.max' => 'Nama kendaraan maksimal 255 karakter',
        'plat_nomor.required' => 'Plat nomor wajib diisi',
        'plat_nomor.max' => 'Plat nomor maksimal 255 karakter',
        'status.required' => 'Status wajib dipilih',
        'status.in' => 'Status invalid',
    ];


    public function index(Request $request)
    {
        $search = $request->input('search');
        $search_keys = [
            'vehicle.nama_kendaraan',
            'service_date',
            'keterangan',
            'cost'
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
                    ->paginate(15)
                    ->withQueryString();
        return view($this->view.'.daftar', compact('data', 'search'));
    }

    public function create()
    {
        $vehicle = Vehicle::all();
        return view($this->view.'.form', ['mode' => 'create'], compact('vehicle'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate($this->rules, $this->messages);
        $this->model::create($validate);
        return redirect()->route($this->route)->with(['successToast' => ucfirst($this->echo).' berhasil ditambahkan']);
    }

    public function edit($id)
    {
        $data = $this->model::find($id);

        if($data){
            $vehicle = Vehicle::all();
            return view($this->view.'.form', ['mode' => 'update'], compact('data', 'vehicle'));
        } else {
            return redirect()->route($this->route)->withErrors(['message' => ucfirst($this->echo).' tidak ditemukan']);
        }
    }

    public function update(Request $request, $id )
    {
        $data = $this->model::where($this->primary, $id)->firstOrFail();

        if($data){
            $validate = $request->validate($this->rules, $this->messages);

            if ($request->status == 1 || $request->status == 3) {
                Vehicle::where('id_vehicle', $request->vehicle_id)->firstOrFail()->update(['status' => 1]);
            }
            if ($request->status == 2) {
                Vehicle::where('id_vehicle', $request->vehicle_id)->firstOrFail()->update(['status' => 3]);
            }
            $data->update($validate);

            return redirect()->route($this->route)->with(['successToast' => ucfirst($this->echo).' berhasil diperbarui']);
        } else {
            return redirect()->route($this->route)->withErrors(['message' => ucfirst($this->echo).' tidak ditemukan']);
        }
    }

    public function destroy($id)
    {
        $this->model::findOrFail($id)->delete();
        return redirect()->route($this->route)->with(['successToast' => ucfirst($this->echo).' berhasil dihapus']);
    }
}
