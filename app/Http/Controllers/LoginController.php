<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Http\Request;
use Sentinel;
use App\Http\Requests;
use App\VrfyCode;
use Cartalyst\Sentinel\Users\EloquentUser;

class LoginController extends Controller
{
    //
    public function login() {
        return view('login.login');
    }

    public function vrfy(Request $request) {
        $input = $request->only('email', 'password');
        try{
            if(Sentinel::authenticate($input)) {
//                $code = rand(1000, 9999);
//                $user_id = 1;
//                $newcode = new VrfyCode;
//                $newcode->user_id = $user_id;
//                $newcode->code = $code;
//                $newcode->save();
                return $this->redirectVrfyCode();
            }
            return redirect()->back()->withInput()->withErrorMessage('Invalid credentials provided');
        } catch (NotActivatedException $e) {
            return redirect()->back()->withInput()->withErrorMessage('User Not Activated.');
        } catch (ThrottlingException $e) {
            return redirect()->back()->withInput()->withErrorMessage($e->getMessage());
        }
    }

    protected function redirectVrfyCode() {
//        return redirect('/');
        return view('login.verify');
    }
    protected function redirectWhenLoggedIn() {

    }

//    public function generatecode() {
//        $code = rand(1000, 9999);
//        VrfyCode::create($code);
//    }
}
