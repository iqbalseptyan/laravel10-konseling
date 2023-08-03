<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa\PesertaBimbingan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaBimbinganController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {
        $user = User::with('siswa')->find(Auth::id());

        $pesertaBimbingan = ['id_jadwal_bimbingan' => (int)$request->input('id_jadwal_bimbingan'), 'id_siswa' => $user->siswa->id];
        PesertaBimbingan::create($pesertaBimbingan);

        return redirect()->route('siswa/jadwal-bimbingan')->with('success', 'berhasil memilih jadwal');
    }
}
