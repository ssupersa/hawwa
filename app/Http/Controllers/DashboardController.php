<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Fungsi ini akan menentukan view berdasarkan role user yang login
     */
    public function index()
    {
        $user = Auth::user(); // Ambil user yang sedang login

        // Cek role dan arahkan ke halaman dashboard sesuai role
        if ($user->hasRole('admin')) {
            return view('dashboard.admin');
        } elseif ($user->hasRole('ustadz')) {
            return view('dashboard.ustadz');
        } else {
            return view('dashboard.user');
        }
    }
}
