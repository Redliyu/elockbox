<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Sentinel;

class AdminController extends Controller
{
    //
    public function getHome() {
//        return view('admin.admin_dashboard');
        return view('admin.activity.view');
    }

    public function logout() {
        Sentinel::logout();
        return redirect()->intended('/');
    }
}
