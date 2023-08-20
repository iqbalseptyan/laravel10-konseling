<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $data = ['title' => 'Data Pengumuman'];

        return view('admin.pengumuman.index', $data);
    }
}
