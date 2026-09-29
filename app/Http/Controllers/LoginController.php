<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\AuditLogger;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (! auth()->attempt(array_merge($request->only('email', 'password'), ['status'=>'Aktif']))) {
            return to_route('login')->withErrors([
                'email' => 'Akun tersebut tidak terdaftar di sistem!',
            ])->withInput($request->only('email'));
        }

        $request->session()->regenerate();
        auth()->user()->update(['last_login_at'=>now()]);
        AuditLogger::log('Login','Autentikasi','User berhasil login');

        return to_route('home');
    }
}
