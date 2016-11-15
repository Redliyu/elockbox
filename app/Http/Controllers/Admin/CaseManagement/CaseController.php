<?php

namespace App\Http\Controllers\Admin\CaseManagement;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sentinel;

class CaseController extends Controller
{
    //
    public function create() {
        return view('case.create');
    }
}
