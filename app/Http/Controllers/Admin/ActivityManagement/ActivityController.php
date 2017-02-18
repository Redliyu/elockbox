<?php

namespace App\Http\Controllers\admin\ActivityManagement;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    //
    public function view() {
        
        return view('admin/activity/view');
    }
}
