<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationFormRequest;
use Sentinel;
use App\Http\Requests;

class RegistrationController extends Controller
{
    //
    public function create() {
        return view('registration.create');
    }

    public function store(RegistrationFormRequest $request) {
        $input = $request->only('email', 'password', 'first_name', 'last_name');
        $user = Sentinel::registerAndActivate($input);
        $role = $request->only('role');
        $usersRole = Sentinel::findRoleByName($role);
        $usersRole->users()->attach($user);
        return redirect('/create')->withFlashMessage('User Successfully Created!');
    }
}
