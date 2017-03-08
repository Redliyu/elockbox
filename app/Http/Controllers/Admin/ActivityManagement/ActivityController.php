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
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ActivityController extends Controller
{
    //
    public function view() {
        $admins = UserRole::where("role_id", 1)->get();
        $managers = UserRole::where("role_id", 2)->get();
        $staffs = UserRole::where("role_id", 3)->get();
        $activities = Activity::all();
        return view('admin/activity/view', [
            'activities' => $activities,
            'admins' => $admins,
            'managers' => $managers,
            'staffs' => $staffs,
        ]);
    }

    public function create(Request $request) {
        try{
            $activity = new Activity;
            $activity->subject = $request->get('subject');
            $activity->ddl = date("Y-m-d", strtotime($request->get('ddl')));
            $recipient = User::where('email', $request->get('recipient'))->first()->id;
            $activity->assigned = $recipient;
            $activity->creator = Sentinel::getUser()->id;
            if($request->get('mentioned')) {
                $mentioned = User::where('email', $request->get('mentioned'))->first()->id;
                $activity->mentioned = $mentioned;
            }
            $activity->message = $request->get('message');
            $activity->save();
        } catch (InvalidArgumentException $e) {
            print $e;
        }
        return redirect('admin');
    }
//    public function
}
