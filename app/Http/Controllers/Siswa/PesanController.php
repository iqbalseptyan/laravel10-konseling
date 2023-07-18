<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function pesan_masuk()
    {
        $pesanMasuk = Pesan::with('tujuan.siswa')->where('id_tujuan', Auth::id())->get();

        $data = ['title' => 'Halaman Pesan Masuk', 'pesanMasuk' => $pesanMasuk];
        return view('siswa.pesan.masuk.index', $data);
    }

    public function pesan_keluar()
    {
        $pesanKeluar = Pesan::with(['asal.siswa', 'tujuan.siswa'])->where('id_asal', Auth::id())->get();

        $data = ['title' => 'Halaman Pesan Keluar', 'pesanKeluar' => $pesanKeluar];
        return view('siswa.pesan.keluar.index', $data);
    }

    public function pesan_keluar_create()
    {

        $user = User::with('konselor')->where('level', '<>', 0)->where('level', 1)->get();

        $data = ['title' => 'Halaman Tambah Pesan Keluar', 'user' => $user];
        return view('siswa.pesan.keluar.create', $data);
    }

    public function pesan_keluar_store(Request $request)
    {
        $validated = $request->validate([
            'tujuan' => ['required'],
            'subjek' => ['required'],
            'keterangan' => ['required'],
        ]);

        $validatedData = $request->except('tujuan');

        $validatedData['id_asal'] = Auth::id();
        $validatedData['id_tujuan'] = $validated['tujuan'];

        Pesan::create($validatedData);
        return redirect()->route('siswa/pesan-keluar')->with('success', 'berhasil menambahkan pesan keluar');
    }
}
