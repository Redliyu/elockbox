<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationFormRequest;
use Sentinel;
use App\Http\Requests;
use DB;
use App\VrfyCode;

class RegistrationController extends Controller
{
    //
    public function create() {
        return view('registration.create');
    }

    public function store(RegistrationFormRequest $request) {
        //get email, pwd, f_n, l_n
        $input = $request->only('email', 'password', 'first_name', 'last_name');
        ////register and activate, store account into users table and activations table
        $user = Sentinel::registerAndActivate($input);
        //get role
        $role = $request->only('role');
        //find a role from roles table
        $usersRole = Sentinel::findRoleByName($role);
        ////assign a role to this user and store in role_users table
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
        //return back with message
        return redirect('/create')->withFlashMessage('User Successfully Created!');
    }
}
