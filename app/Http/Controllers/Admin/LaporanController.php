<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::all();
        $data = ['title' => 'Data Laporan', 'laporan' => $laporan];

        return view('admin.laporan.index', $data);
    }
}
