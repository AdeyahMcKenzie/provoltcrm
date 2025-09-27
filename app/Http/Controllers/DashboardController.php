<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       // dd(request()->getHost(), request()->url(), request()->cookie('laravel_session'), Auth::user());
        return view('dashboard'); 
    }
}
