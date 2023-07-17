<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();

        $data = ['title' => 'Halaman Kelas', 'kelas' => $kelas];

        return view('admin.kelas.index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Halaman Tambah Kelas',];

        return view('admin.kelas.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required']
        ]);

        Kelas::create($validated);
        return redirect()->route('admin/kelas')->with('success', 'berhasil menambahkan kelas');
    }

    public function edit(Kelas $kelas)
    {
        $data = ['title' => 'Halaman Ubah Kelas', 'kelas' => $kelas];

        return view('admin.kelas.edit', $data);
    }

    public function update(Kelas $kelas, Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required']
        ]);

        $kelas->update($validated);
        return redirect()->route('admin/kelas')->with('success', 'berhasil mengubah kelas');
    }


    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('admin/kelas')->with('success', 'berhasil menghapus kelas');
    }
}
