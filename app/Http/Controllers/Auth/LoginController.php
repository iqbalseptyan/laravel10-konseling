<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $data = ['title' => 'Halaman Login'];

        return view('auth.login', $data);
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->level == 0) {
                return redirect()->intended('admin/dashboard');
            } elseif ($user->level == 1) {
                return redirect()->intended('konselor/dashboard');
            } else {
                return redirect()->intended('siswa/dashboard');
            }
        }

        return back()->withErrors([
            'username' => 'Username atau Password salah!',
        ]);
    }
}
