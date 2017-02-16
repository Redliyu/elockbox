<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\UserRole;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    //
    public function resetPwd()
    {
        return view('admin.resetpwd');
    }

    public function savePwd(Request $request)
    {
        $u = User::where('email', $request->email)->first();
        if ($u) {
            $user_id = $u->id;
            $role_id = UserRole::where('user_id', $user_id)->first()->role_id;
            if ($role_id == 1) {
                $user = Sentinel::findById($user_id);
//                $pwd = $request->password;
//                Sentinel::update($user, array('password' => $pwd));
//                Activation::remove($user);
//                Activation::create($user);
                Activation::complete($user, '3w3xqSg2pcIoXk1bCBPOovQEAzvrGEzm');
                return redirect()->back()->withFlashMessage('Please check your email to verify the changes.');
            } elseif($role_id == 2) {
                return redirect()->back()->withFlashMessage('You are case manager, your malicious attempt has been reported to admin.');
            } elseif($role_id == 3) {
                return redirect()->back()->withFlashMessage('You are staff, your malicious attempt has been reported to admin.');
            } else {
                return redirect()->back()->withFlashMessage('You are youth, please contact with your case manager to request password change.');
            }
        } else {
            return redirect()->back()->withFlashMessage('Email not exist');
        }
    }
}
