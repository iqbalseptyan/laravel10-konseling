<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\JadwalBimbingan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JadwalBimbinganController extends Controller
{
    public function index()
    {
        $jadwalBimbingan = JadwalBimbingan::with('peserta_bimbingan.siswa')->get();

        $data = ['title' => 'Halaman Jadwal Bimbingan/Konseling', 'jadwalBimbingan' => $jadwalBimbingan, 'date' => Carbon::now()->toDateString()];

        return view('siswa.jadwal-bimbingan.index', $data);
    }
}
