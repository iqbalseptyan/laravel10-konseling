<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\KomentarPesan;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarPesanController extends Controller
{
    public function pesan(Pesan $pesan)
    {
        $komentarPesan = KomentarPesan::with(['pesan', 'user.siswa', 'user.konselor'])->where('id_pesan', $pesan->id)->get();

        $data = ['title' => 'Halaman Komentar Pesan', 'pesan' => $pesan, 'komentarPesan' => $komentarPesan];

        return view('siswa.komentar.pesan', $data);
    }

    public function pesan_store(Pesan $pesan, Request $request)
    {
        $validated = $request->validate([
            'keterangan' => ['required']
        ]);

        $validated['id_pesan'] = $pesan->id;
        $validated['id_user'] = Auth::id();

        KomentarPesan::create($validated);

        return redirect()->back()->with('success', 'berhasil menambahkan kelas');
    }
}
