<?php

namespace App\Http\Controllers;

use App\Models\KasusSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

class ProfilSiswaController extends Controller
{
    public function index(Siswa $siswa)
    {
        $kasus = KasusSiswa::with('kasus', 'siswa')->where('id_siswa', $siswa->id)->get();
        $data = ['title' => 'Halaman Profil', 'siswa' => $siswa, 'kasus' => $kasus];
        return view('profile.siswa.index', $data);
    }
}
