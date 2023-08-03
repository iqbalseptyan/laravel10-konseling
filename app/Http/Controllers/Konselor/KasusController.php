<?php

namespace App\Http\Controllers\Konselor;

use App\Http\Controllers\Controller;
use App\Models\Kasus;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    public function index()
    {
        $kasus = Kasus::all();
        $data = ['title' => 'Halaman Kasus', 'kasus' => $kasus];

        return view('konselor.kasus.index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Halaman Tambah Kasus'];

        return view('konselor.kasus.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => ['required'],
            'bentuk' => ['required'],
        ]);

        Kasus::create($validated);
        return redirect()->route('konselor/kasus')->with('success', 'berhasil menambahkan jenis kasus');
    }

    public function edit(Kasus $kasus)
    {
        $data = ['title' => 'Halaman Ubah Kasus', 'kasus' => $kasus];

        return view('konselor.kasus.edit', $data);
    }

    public function update(Kasus $kasus, Request $request)
    {
        $validated = $request->validate([
            'kategori' => ['required'],
            'bentuk' => ['required'],
        ]);

        $kasus->update($validated);
        return redirect()->route('konselor/kasus')->with('success', 'berhasil mengubah jenis kasus');
    }


    public function destroy(Kasus $kasus)
    {
        $kasus->delete();
        return redirect()->route('konselor/kasus')->with('success', 'berhasil menghapus jenis kasus');
    }
}
