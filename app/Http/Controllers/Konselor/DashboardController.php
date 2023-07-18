<?php

namespace App\Http\Controllers\Konselor;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::count();
        $data = ['title' => 'Halaman Dashboard', 'siswa' => $siswa];

        return view('konselor.dashboard.index', $data);
    }
}
