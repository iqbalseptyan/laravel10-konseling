<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\KasusSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasusSiswaController extends Controller
{
    public function index()
    {
        $kasusSiswa = KasusSiswa::all();
        // dd($kasusSiswa);
        $kasusSiswa = KasusSiswa::with(['siswa.user', 'kasus'])->whereHas('siswa', function ($query) {
            return $query->where('id_user', Auth::id());
        })->get();

        $data = ['title' => 'Halaman Kasus', 'kasusSiswa' => $kasusSiswa];

        return view('siswa.kasus-siswa.index', $data);
    }
}
