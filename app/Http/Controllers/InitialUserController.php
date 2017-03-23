<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use DB;
use App\VrfyCode;
use App\UserProfile;
use App\Http\Requests;

class InitialUserController extends Controller
{
    //
    public function debugcreate() {
        return view('debugcreate');
    }

    public function debugstore(Request $request) {
        $input = $request->only('email', 'password', 'first_name', 'last_name');
        $user = Sentinel::registerAndActivate($input);
        $role = $request->only('role');
        $usersRole = Sentinel::findRoleByName($role);
        $usersRole->users()->attach($user);
        ////set a default code and store in code table
        $email = $request->only('email');
        //find user id
        $user_id = DB::table('users')->where('email', $email)->first()->id;
        $default_code = 100000000;
        //save user id and default code into code table
        $newcode = new VrfyCode;
        $newcode->user_id = $user_id;
        $newcode->code = $default_code;
        $newcode->save();
        //save other information into profile table
        $newprofile = new UserProfile;
        $newprofile->user_id = $user_id;
        $newprofile->save();
        return redirect('/');
    }
}
