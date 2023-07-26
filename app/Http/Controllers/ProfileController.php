<?php

namespace App\Http\Controllers;

use App\Models\Konselor;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (Auth::user()->level == 1) {
            $user['nama'] = Konselor::where('id_user', $user->id)->first()->nama;
        } elseif (Auth::user()->level == 2) {
            $user['nama'] = Siswa::where('id_user', $user->id)->first()->nama;
        }
        $data = ['title' => 'Halaman Profil', 'user' => $user];

        return view('profile.index', $data);
    }

    public function update_password(Request $request)
    {
        $validated = $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required',
            'konfirmasi_password' => ['required', 'same:password_baru'],
        ]);

        $user = User::find(Auth::id());
        if (Hash::check($validated['password_lama'], $user->password)) {
            $user->update(['password' => Hash::make($validated['password_baru'])]);
            return redirect()->back()->with('success', 'password berhasil berhasil dirubah');
        }

        return redirect()->back()->with('error', 'password lama tidak sesuai');
    }

    public function update_foto(Request $request)
    {
        $request->validate([
            'foto' => ['required', 'mimes:png,jpg']
        ]);

        $user = User::find(Auth::id());

        $user->update(['foto' => $request->file('foto')->store('foto')]);

        return redirect()->back()->with('success', 'foto berhasil dirubah');
    }
}
