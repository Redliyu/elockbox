<?php

namespace App\Http\Controllers\admin\ActivityManagement;

use Illuminate\Http\Request;
use App\User;
use App\UserRole;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    //
    public function view() {
        $admins = UserRole::where("role_id", 1)->get();
        $managers = UserRole::where("role_id", 2)->get();
        $staffs = UserRole::where("role_id", 3)->get();

        return view('admin/activity/view', [
            'admins' => $admins,
            'managers' => $managers,
            'staffs' => $staffs,
        ]);
    }

    public function create(Request $request) {
        echo "create act";
        echo($request->get('recipient'));
        echo($request->get('mentioned'));
        echo($request->get('subject'));
        echo($request->get('message'));

    }

//    public function
}
