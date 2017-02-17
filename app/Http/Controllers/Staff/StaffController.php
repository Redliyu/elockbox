<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sentinel;

class StaffController extends Controller
{
    //
    public function getHome() {
        return view('layouts.dashboard');
    }
    public function logout() {
        Sentinel::logout();
        return redirect()->intended('/');
    }
}
