<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $model = User::class;
    protected $route = 'dashboard.user';
    protected $view = 'app.user';
    protected $primary = 'id_user';
    protected $echo = 'pengguna';
    protected $page = 'user';

    protected $rules = [
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|string|min:8|max:255',
        'role' => 'required|string|in:admin,employee,supervisor,manager',
    ];
    protected $messages = [
        'nama.required' => 'Nama wajib diisi',
        'nama.string' => 'Nama harus berupa teks',
        'nama.max' => 'Nama maksimal 255 karakter',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'email.max' => 'Email maksimal 255 karakter',
        'password.required' => 'Password wajib diisi',
        'password.string' => 'Password harus berupa teks',
        'password.max' => 'Password minimal 8 karakter',
        'password.max' => 'Password maksimal 255 karakter',
        'role.required' => 'Role wajib dipilih',
        'role.in' => 'Role harus salah satu dari: admin, employee, supervisor, manager',
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');
        $search_keys = ['nama', 'email', 'role'];

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

    public function edit_password($id)
    {
        $data = $this->model::find($id);

        if($data){
            return view($this->view.'.form-password', ['mode' => 'update'], compact('data'));
        } else {
            return redirect()->route($this->route)->withErrors(['message' => ucfirst($this->echo).' tidak ditemukan']);
        }
    }

    public function update(Request $request, $id )
    {
        $data = $this->model::where($this->primary, $id)->firstOrFail();

        if($data){
            $validate = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'role' => 'required|string|in:admin,employee,supervisor,manager',
            ], $this->messages);
            $data->update($validate);

            return redirect()->route($this->route)->with(['successToast' => ucfirst($this->echo).' berhasil diperbarui']);
        } else {
            return redirect()->route($this->route)->withErrors(['message' => ucfirst($this->echo).' tidak ditemukan']);
        }
    }

    public function update_password(Request $request, $id )
    {
        $data = $this->model::where($this->primary, $id)->firstOrFail();

        if($data){
            $validate = $request->validate([
                'password' => 'required|string|min:8|max:255|confirmed',
            ], [
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 8 karakter',
                'password.max' => 'Password maksimal 255 karakter',
                'password.confirmed' => 'Konfirmasi password tidak sama',
            ]);
            $data->update($validate);

            return redirect()->route($this->route)->with(['successToast' => 'Password '.$this->echo.' berhasil diperbarui']);
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
