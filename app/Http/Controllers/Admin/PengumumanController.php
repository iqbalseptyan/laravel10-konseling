<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all();
        $data = ['title' => 'Data Pengumuman', 'pengumuman' => $pengumuman];

        return view('admin.pengumuman.index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Halaman Tambah Pengumuman',];

        return view('admin.pengumuman.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => ['required'],
            'keterangan' => ['required']
        ]);

        $validated['id_user'] = Auth::id();

        Pengumuman::create($validated);
        return redirect()->route('admin/pengumuman')->with('success', 'berhasil menambahkan pengumuman');
    }

    public function edit(Pengumuman $pengumuman)
    {
        $data = ['title' => 'Halaman Ubah Pengumuman', 'pengumuman' => $pengumuman];

        return view('admin.pengumuman.edit', $data);
    }

    public function update(Pengumuman $pengumuman, Request $request)
    {
        $validated = $request->validate([
            'judul' => ['required'],
            'keterangan' => ['required']
        ]);

        $validated['id_user'] = Auth::id();

        $pengumuman->update($validated);
        return redirect()->route('admin/kelas')->with('success', 'berhasil mengubah pengumuman');
    }


    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();
        return redirect()->route('admin/pengumuman')->with('success', 'berhasil menghapus pengumuman');
    }

    public function show(Pengumuman $pengumuman)
    {
        $data = ['title' => 'Data Pengumuman', 'pengumuman' => $pengumuman];

        return view('admin.pengumuman.show', $data);
    }
}
