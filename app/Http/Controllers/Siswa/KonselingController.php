<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Konseling;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonselingController extends Controller
{
    public function index()
    {
        $user = User::with('siswa')->find(Auth::id());

        $konseling = Konseling::with(['konselor', 'konseling_siswas.siswa'])->whereHas('konseling_siswas', function (Builder $query) use ($user) {
            $query->where("id_siswa", $user->siswa->id);
        })->get();

        $data = ['title' => 'Halaman Konseling', 'konseling' => $konseling];

        return view('siswa.konseling.index', $data);
    }
}
