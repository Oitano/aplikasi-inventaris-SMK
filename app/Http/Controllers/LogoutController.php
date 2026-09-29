<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\AuditLogger;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        AuditLogger::log('Logout','Autentikasi','User berhasil logout');
        auth()->logout();

        return to_route('login')->with('success', 'Berhasil keluar dari aplikasi!');
    }
}
