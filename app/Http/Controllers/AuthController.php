<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'no_tlp' => 'required|string|max:20',
            'password' => 'required|min:6|confirmed',
            'city_of_practice' => 'required|string|max:100',
            'institution_of_practice' => 'required|in:Apotek,Rumah Sakit,Industri,Pemerintah (Dinkes, BPOM, Puskesmas, dll)',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_tlp' => '+62' . ltrim($request->no_tlp, '0'),
            'password' => Hash::make($request->password),
            'city_of_practice' => $request->city_of_practice,
            'institution_of_practice' => $request->institution_of_practice,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/seminar');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/homepage');
    }
}
