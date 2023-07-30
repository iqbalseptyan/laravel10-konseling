<?php

namespace App\Http\Controllers\Konselor;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::all();
        $data = ['title' => 'Data Laporan', 'laporan' => $laporan];

        return view('konselor.laporan.index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Data Laporan'];

        return view('konselor.laporan.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required'],
            'file' => ['required', 'mimetypes:application/pdf'],
            'tgl_laporan' => ['required'],
        ]);

        $path = $request->file('file')->store('laporan');
        $validated['file'] = $path;

        Laporan::create($validated);

        return redirect()->route('konselor/laporan')->with('success', 'berhasil menambah data laporan');
    }

    public function edit(Laporan $laporan)
    {
        $data = ['title' => 'Ubah Data Laporan', 'laporan' => $laporan];

        return view('konselor.laporan.edit', $data);
    }

    public function update(Request $request, Laporan $laporan)
    {
        $validated = $request->validate([
            'nama' => ['required'],
            'file' => ['required', 'mimetypes:application/pdf'],
            'tgl_laporan' => ['required'],
        ]);

        if (Storage::url($laporan->file)) {
            Storage::delete($laporan->file);
        }

        $path = $request->file('file')->store('laporan');
        $validated['file'] = $path;

        $laporan->update($validated);

        return redirect()->route('konselor/laporan')->with('success', 'berhasil mengubah data laporan');
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return redirect()->route('konselor/laporan')->with('success', 'berhasil mengubah data laporan');
    }
}
