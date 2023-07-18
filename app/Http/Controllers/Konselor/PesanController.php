<?php

namespace App\Http\Controllers\Konselor;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function pesan_masuk()
    {
        $data = ['title' => 'Halaman Pesan Masuk'];
        return view('konselor.pesan.masuk', $data);
    }

    public function pesan_keluar()
    {
        $pesanKeluar = Pesan::with('tujuan.siswa')->get();

        $data = ['title' => 'Halaman Pesan Keluar', 'pesanKeluar' => $pesanKeluar];
        return view('konselor.pesan.keluar', $data);
    }

    public function pesan_keluar_create()
    {

        $user = User::with('siswa')->where('level', '<>', 0)->where('level', 2)->get();

        $data = ['title' => 'Halaman Tambah Pesan Keluar', 'user' => $user];
        return view('konselor.pesan.create', $data);
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
        return redirect()->route('konselor/pesan-keluar')->with('success', 'berhasil menambahkan pesan keluar');
    }

    public function pesan_keluar_comment(Request $request)
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
        return redirect()->route('konselor/pesan-keluar')->with('success', 'berhasil menambahkan pesan keluar');
    }
}
