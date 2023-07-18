<?php

namespace App\Http\Controllers\Konselor;

use App\Http\Controllers\Controller;
use App\Models\JadwalBimbingan;
use App\Models\Konselor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalBimbinganController extends Controller
{
    public function index()
    {
        $jadwalBimbingan = JadwalBimbingan::with('peserta_bimbingan.siswa')->get();

        $data = ['title' => 'Halaman Kasus', 'jadwalBimbingan' => $jadwalBimbingan];

        return view('konselor.jadwal-bimbingan.index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Halaman Tambah Jadwal Bimbingan'];

        return view('konselor.jadwal-bimbingan.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required'],
            'tgl_bimbingan' => ['required'],
        ]);

        $konselor = Konselor::where('id_user', Auth::id())->first();
        $validated['id_konselor'] = $konselor->id;
        JadwalBimbingan::create($validated);
        return redirect()->route('konselor/jadwal-bimbingan')->with('success', 'berhasil menambahkan jadwal bimbingan');
    }

    public function edit(JadwalBimbingan $jadwalBimbingan)
    {
        $data = ['title' => 'Halaman Ubah Kasus', 'jadwalBimbingan' => $jadwalBimbingan];

        return view('konselor.jadwal-bimbingan.edit', $data);
    }

    public function update(JadwalBimbingan $jadwalBimbingan, Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required'],
            'tgl_bimbingan' => ['required'],
        ]);

        $konselor = Konselor::where('id_user', Auth::id())->first();
        $validated['id_konselor'] = $konselor->id;
        $jadwalBimbingan->update($validated);

        return redirect()->route('konselor/jadwal-bimbingan')->with('success', 'berhasil mengubah jadwal bimbingan');
    }


    public function destroy(JadwalBimbingan $jadwalBimbingan)
    {
        $jadwalBimbingan->delete();
        return redirect()->route('konselor/jadwal-bimbingan')->with('success', 'berhasil menghapus kasus siswa');
    }
}
