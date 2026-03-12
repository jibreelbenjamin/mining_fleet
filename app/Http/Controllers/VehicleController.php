<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    protected $model = Vehicle::class;
    protected $route = 'dashboard.vehicle';
    protected $view = 'app.vehicle';
    protected $primary = 'id_vehicle';
    protected $echo = 'kendaraan';
    protected $page = 'vehicle';

    protected $rules = [
        'nama_kendaraan' => 'required|string|max:255',
        'jenis_kendaraan' => 'required|string|max:255',
        'plat_nomor' => 'required|string|max:255',
        'status' => 'required|int|in:1,2,3,4',
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
        $search_keys = ['nama_kendaraan', 'plat_nomor', 'jenis_kendaraan'];

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
        return view($this->view.'.form', ['mode' => 'create']);
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
            return view($this->view.'.form', ['mode' => 'update'], compact('data'));
        } else {
            return redirect()->route($this->route)->withErrors(['message' => ucfirst($this->echo).' tidak ditemukan']);
        }
    }

    public function update(Request $request, $id )
    {
        $data = $this->model::where($this->primary, $id)->firstOrFail();

        if($data){
            $validate = $request->validate($this->rules, $this->messages);
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
