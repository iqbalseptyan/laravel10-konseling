<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KasusSiswa;
use App\Models\Kelas;
use App\Models\Konselor;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $year = Carbon::now()->year;
        $kelas = Kelas::count();
        $siswa = Siswa::count();
        $konselor = Konselor::count();
        $kasusSiswa = KasusSiswa::selectRaw("count(id) as data, MONTH(created_at) as month")
            ->groupBy('month')
            ->whereRaw("YEAR(created_at) = $year")
            ->get();

        // $grafik = ['asd', 'asds'];
        for ($i = 1; $i <= 12; $i++) {
            $grafik[] = ['bulan' => date("F", mktime(0, 0, 0, $i, 1)), 'data' => 0];
            foreach ($kasusSiswa as $ks) {
                if ($i == $ks->month) {
                    $grafik[] = ['bulan' => date("F", mktime(0, 0, 0, $i, 1)), 'data' => $ks->month];
                }
            }
        }
        // dd($grafik);

        $data = ['title' => 'Halaman Dashboard', 'siswa' => $siswa, 'konselor' => $konselor, 'kelas' => $kelas, 'grafik' => $grafik];
        return view('admin.dashboard.index', $data);
    }
}
