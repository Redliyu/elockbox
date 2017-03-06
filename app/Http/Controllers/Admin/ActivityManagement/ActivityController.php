<?php

namespace App\Http\Controllers\admin\ActivityManagement;

use App\Activity;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use App\User;
use App\UserRole;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

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
//        echo($request->get('recipient'));
//        echo($request->get('mentioned'));
//        echo($request->get('subject'));
//        echo($request->get('message'));
//        echo($request->get('ddl'));
        try{
            $activity = new Activity;
            $activity->subject = $request->get('subject');
            $activity->ddl = date("Y-m-d", strtotime($request->get('ddl')));
            $recipient = User::where('email', $request->get('recipient'))->first()->id;
            $activity->assigned = $recipient;
            $activity->creator = Sentinel::getUser()->id;
            $mentioned = User::where('email', $request->get('mentioned'))->first()->id;
            $activity->mentioned = $mentioned;
            $activity->message = $request->get('message');
            $activity->save();
        } catch (InvalidArgumentException $e) {
            print $e;
        }
        return redirect('admin');
    }

//    public function
}
