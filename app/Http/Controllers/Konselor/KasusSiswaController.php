<?php

namespace App\Http\Controllers\Konselor;

use App\Http\Controllers\Controller;
use App\Models\Kasus;
use App\Models\KasusSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KasusSiswaController extends Controller
{
    public function index()
    {
        $kasusSiswa = KasusSiswa::with(['siswa', 'kasus'])->get();

        $data = ['title' => 'Data Kasus Siswa', 'kasusSiswa' => $kasusSiswa];

        return view('konselor.kasus-siswa.index', $data);
    }

    public function create()
    {
        $kasus = Kasus::all();
        $siswa = Siswa::with('kelas')->get();

        $data = ['title' => 'Halaman Tambah Kasus Siswa', 'kasus' => $kasus, 'siswa' => $siswa];

        return view('konselor.kasus-siswa.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kasus' => ['required'],
            'siswa' => ['required'],
        ]);

        KasusSiswa::create(['id_siswa' => $validated['siswa'], 'id_kasus' => $validated['kasus']]);
        return redirect()->route('konselor/kasus-siswa')->with('success', 'berhasil menambahkan kasus siswa');
    }

    public function edit(KasusSiswa $kasusSiswa)
    {
        $kasus = Kasus::all();
        $siswa = Siswa::with('kelas')->get();
        $data = ['title' => 'Halaman Ubah Kasus', 'kasus' => $kasus, 'siswa' => $siswa, 'kasusSiswa' => $kasusSiswa];

        return view('konselor.kasus-siswa.edit', $data);
    }

    public function update(KasusSiswa $kasusSiswa, Request $request)
    {
        $validated = $request->validate([
            'kasus' => ['required'],
            'siswa' => ['required'],
        ]);

        $kasusSiswa->update(['id_siswa' => $validated['siswa'], 'id_kasus' => $validated['kasus']]);
        return redirect()->route('konselor/kasus-siswa')->with('success', 'berhasil mengubah kasus siswa');
    }


    public function destroy(KasusSiswa $kasusSiswa)
    {
        $kasusSiswa->delete();
        return redirect()->route('konselor/kasus-siswa')->with('success', 'berhasil menghapus kasus siswa');
    }
}
