<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        //
    }

    public function checkAuth()
    {
        if (Auth::check()){
            return redirect('dashboard');
        }
        else{
            return view('auth.login');
        }
    }

}
