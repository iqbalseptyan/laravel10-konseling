<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();

        $data = ['title' => 'Halaman Kelas', 'siswa' => $siswa];

        return view('admin.siswa.index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Halaman Tambah Siswa', 'kelas' => Kelas::all()];

        return view('admin.siswa.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => ['required', 'unique:tbl_siswa'],
            'kelas' => ['required'],
            'nama' => ['required'],
            'alamat' => ['required'],
            'tgl_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
        ]);

        $validated['id_kelas'] = $request->input('kelas');
        Siswa::create($validated);
        return redirect()->route('admin/siswa')->with('success', 'berhasil menambahkan siswa');
    }

    public function edit(Siswa $siswa)
    {
        $data = ['title' => 'Halaman Ubah Siswa', 'siswa' => $siswa, 'kelas' => Kelas::all()];

        return view('admin.siswa.edit', $data);
    }

    public function update(Siswa $siswa, Request $request)
    {
        $validated = $request->validate([
            'nisn' => ['required', Rule::unique('tbl_siswa')->ignore($siswa->id)],
            'kelas' => ['required'],
            'nama' => ['required'],
            'alamat' => ['required'],
            'tgl_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
        ]);
        $validated['id_kelas'] = $request->input('kelas');
        $siswa->update($validated);
        return redirect()->route('admin/siswa')->with('success', 'berhasil mengubah siswa');
    }


    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->route('admin/siswa')->with('success', 'berhasil menghapus siswa');
    }
}
