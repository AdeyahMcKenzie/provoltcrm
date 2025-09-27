<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Debug info
        \Log::info('Dashboard accessed', [
            'user' => Auth::user(),
            'session_id' => session()->getId(),
            'auth_check' => Auth::check()
        ]);

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        return view('dashboard', compact('user'));
    }
}
