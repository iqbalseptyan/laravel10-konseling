<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konselor;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::count();
        $konselor = Konselor::count();
        $data = ['title' => 'Halaman Dashboard', 'siswa' => $siswa, 'konselor' => $konselor];
        return view('admin.dashboard.index', $data);
    }
}
