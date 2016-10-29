<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Http\Request;
use Sentinel;
use DB;
use App\Http\Requests;
use App\Http\Requests\VrfycodeFormRequest;
use App\VrfyCode;
use Cartalyst\Sentinel\Users\EloquentUser;
use Mail;

class LoginController extends Controller
{
    //
    public function login() {
        return view('login.login');
    }

    public function authenticate(Request $request) {
        $input = $request->only('email', 'password');
        try{
            if(Sentinel::authenticate($input)) {
                $code = rand(100000, 999999);
                $email = $request->only('email');
                $user_id = DB::table('users')->where('email', $email)->first()->id;
                DB::table('code')->where('user_id', $user_id)->update(['code'=> $code]);
                $this->basic_email($user_id);
//                $this->vrfy($user_id);
                return $this->redirectVrfyCode($user_id);
            }
            return redirect()->back()->withInput()->withErrorMessage('Invalid credentials provided');
        } catch (NotActivatedException $e) {
            return redirect()->back()->withInput()->withErrorMessage('User Not Activated.');
        } catch (ThrottlingException $e) {
            return redirect()->back()->withInput()->withErrorMessage($e->getMessage());
        }
    }

    protected function redirectVrfyCode($user_id) {
        return view('login.verify', [
            'user_id' => $user_id,
        ]);
    }
    protected function vrfy(VrfycodeFormRequest $request) {
        $input = $request->only('user_id', 'vrfycode');
        $excode = DB::table('code')->where('user_id', $input['user_id'])->first()->code;
        if($excode == $input['vrfycode']) {
            return $this->redirectWhenLoggedIn();
        }
        return redirect('/login')->withInput()->withErrorMessage('Wrong verification code');
    }
    protected function redirectWhenLoggedIn() {
        echo 'Logged in page';
        return null;
    }

    public function basic_email($user_id) {
        $last_name = DB::table('users')->where('id', $user_id)->first()->last_name;
        $code = DB::table('code')->where('id', $user_id)->first()->code;
        $email = DB::table('users')->where('id', $user_id)->first()->email;
        $imgPath = 'http://assets.pokemon.com/static2/_ui/img/chrome/external_link_bumper.png';
        $data = ['name' => $last_name, 'code' => $code, 'email' => $email, 'imgPath' => $imgPath];
        Mail::send('mail', $data, function($message) use($email, $last_name){
            $message->to($email, $last_name )->subject('E-lockbox Verification code');
            $message->from('marisafkj@gmail.com', 'Living Advantage Inc.');
        });
        echo 'A verification code email was sent to ';
        echo $email;
    }

//    public function generatecode() {
//        $code = rand(1000, 9999);
//        VrfyCode::create($code);
//    }
}
