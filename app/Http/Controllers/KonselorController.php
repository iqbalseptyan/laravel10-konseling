<?php

namespace App\Http\Controllers;

use App\Models\Konselor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KonselorController extends Controller
{
    public function index()
    {
        $konselor = Konselor::all();

        $data = ['title' => 'Halaman Konselor', 'konselor' => $konselor];

        return view('admin.konselor.index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Halaman Tambah Konselor'];

        return view('admin.konselor.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required'],
            'username' => ['required', 'lowercase'],
            'password' => ['required'],
        ]);
        $validatedUser = ['username' => $validated['username'], 'password' => $validated['password'], 'level' => 1];
        $user = User::create($validatedUser);

        $validatedKonselor = ['nama' => $validated['nama'], 'id_user' => $user->id];
        Konselor::create($validatedKonselor);
        return redirect()->route('admin/konselor')->with('success', 'berhasil menambahkan konselor');
    }

    public function edit(Konselor $konselor, User $user)
    {
        $data = ['title' => 'Halaman Ubah Siswa', 'konselor' => $konselor, 'user' => $user];

        return view('admin.konselor.edit', $data);
    }

    public function update(Konselor $konselor, Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required'],
            'username' => ['required', 'lowercase', Rule::unique('tbl_user')->ignore($konselor->id_user)],
            'password' => ['required'],
        ]);

        $validatedUser = ['username' => $validated['username'], 'password' => $validated['password']];
        $user = User::find($konselor->id_user);
        $user->update($validatedUser);

        $validatedKonselor = ['nama' => $validated['nama']];
        $konselor->update($validatedKonselor);
        return redirect()->route('admin/konselor')->with('success', 'berhasil mengubah konselor');
    }


    public function destroy(Konselor $konselor)
    {
        $user = User::find($konselor->id_user);
        $user->delete();
        return redirect()->route('admin/konselor')->with('success', 'berhasil menghapus konselor');
    }
}
