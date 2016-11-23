<?php

namespace App\Http\Controllers\Admin\UserManagement;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\UserProfile;
use App\UserRole;
use App\UserStatus;


class UserController extends Controller
{
    //
    public function view() {
        //last_name, first_name, email from user table
        //phone from profile
        //role from role users table and roles table
        //status from activations, if do not have, then not active
        $user = User::all();
        $profile = UserProfile::all();
        $user_role = UserRole::all();
        $status = UserStatus::all();
        return view('user.view', [
            'users' => $user,
            'profiles' => $profile,
            'user_roles' => $user_role,
            'statuss' => $status,
        ]);
    }
}
