<?php

namespace App\Http\Controllers\Konselor;

use App\Http\Controllers\Controller;
use App\Models\Konseling;
use App\Models\KonselingSiswa;
use App\Models\Konselor;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonselingController extends Controller
{
    public function index()
    {
        $user = User::with('konselor')->find(Auth::id());

        $konseling = Konseling::with(['konselor', 'konseling_siswas.siswa'])->where('id_konselor', $user->konselor->id)->get();

        $data = ['title' => 'Halaman Konseling', 'konseling' => $konseling];

        return view('konselor.konseling.index', $data);
    }

    public function create()
    {
        $siswa = Siswa::with('kelas')->get();
        $data = ['title' => 'Halaman Konseling', 'siswa' => $siswa];

        return view('konselor.konseling.create', $data);
    }

    public function store(Request $request)
    {
        $user = User::with('konselor')->find(Auth::id());

        $validated = $request->validate([
            'nama_siswa' => ['required'],
            'tgl_konseling' => ['required'],
            'topik_konseling' => ['required'],
            'catatan' => ['required'],
        ]);

        $konseling = Konseling::create([
            'id_konselor' => $user->konselor->id,
            'topik' => $validated['topik_konseling'],
            'tanggal' => $validated['tgl_konseling'],
            'catatan' => $validated['catatan']
        ]);

        foreach ($validated['nama_siswa'] as $siswa) {
            KonselingSiswa::create([
                'id_konseling' => $konseling->id,
                'id_siswa' => (int)$siswa,
            ]);
        }

        return redirect()->route('konselor/konseling')->with('success', 'berhasil menambahkan catatan bk');
    }

    public function edit(Konseling $konseling)
    {
        $siswa = Siswa::with('kelas')->get();
        $data = ['title' => 'Halaman Ubah Konseling', 'konseling' => $konseling, 'siswa' => $siswa];

        return view('konselor.konseling.edit', $data);
    }

    public function update(Konseling $konseling, Request $request)
    {
        $user = User::with('konselor')->find(Auth::id());

        $validated = $request->validate([
            'nama_siswa' => ['required'],
            'tgl_konseling' => ['required'],
            'topik_konseling' => ['required'],
            'catatan' => ['required'],
        ]);

        $konseling->update([
            'id_konselor' => $user->konselor->id,
            'topik' => $validated['topik_konseling'],
            'tanggal' => $validated['tgl_konseling'],
            'catatan' => $validated['catatan']
        ]);

        $konselingSiswa = KonselingSiswa::where('id_konseling', $konseling->id);

        $konselingSiswa->delete();


        foreach ($validated['nama_siswa'] as $siswa) {
            KonselingSiswa::create([
                'id_konseling' => $konseling->id,
                'id_siswa' => (int)$siswa,
            ]);
        }

        return redirect()->route('konselor/konseling')->with('success', 'berhasil mengubah catatan bk');
    }


    public function destroy(Konseling $konseling)
    {
        $konseling->delete();
        return redirect()->route('konselor/konseling')->with('success', 'berhasil menghapus catatan bk');
    }
}
