<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    protected $model = Driver::class;
    protected $route = 'dashboard.driver';
    protected $view = 'app.driver';
    protected $primary = 'id_driver';
    protected $echo = 'sopir';
    protected $page = 'driver';

    protected $rules = [
        'nama_driver' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string|in:L,P',
        'alamat' => 'nullable|string|max:255',
        'telepon' => 'required|string|max:255',
    ];
    protected $messages = [
        'nama_driver.required' => 'Nama sopir wajib diisi',
        'nama_driver.max' => 'Nama sopir maksimal 255 karakter',
        'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
        'jenis_kelamin.in' => 'Jenis kelamin invalid',
        'alamat.max' => 'Alamat maksimal 255 karakter',
        'telepon.required' => 'Telepon wajib diisi',
        'telepon.max' => 'Telepon maksimal 255 karakter',
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');
        $search_keys = ['nama_driver', 'jenis_kelamin', 'alamat', 'telepon'];

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
