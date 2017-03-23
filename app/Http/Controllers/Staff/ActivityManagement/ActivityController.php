<?php

namespace App\Http\Controllers\Staff\ActivityManagement;

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
        return view('staff/activity/view', [
            'activities' => $activities,
            'admins' => $admins,
            'managers' => $managers,
            'staffs' => $staffs,
        ]);
    }
    public function viewdetail($activity_id) {
        $admins = UserRole::where("role_id", 1)->get();
        $managers = UserRole::where("role_id", 2)->get();
        $staffs = UserRole::where("role_id", 3)->get();
        $activity = Activity::where("id", $activity_id)->first();

        if ($activity->assigned == Sentinel::getUser()->id) {
            $activity->reci_status = 1;
        }
        if ($activity->mentioned == Sentinel::getUser()->id) {
            $activity->ment_status = 1;
        }
        $activity->save();
        $activities = Activity::all();

        return view('staff/activity/detail', [
            'activities' => $activities,
            'activity' => $activity,
            'admins' => $admins,
            'managers' => $managers,
            'staffs' => $staffs,
        ]);
    }
//    public function update($activity_id, Request $request) {
//        try{
//            $activity = Activity::where('id', $activity_id)->first();
////            echo $activity;
//            $activity->subject = $request->get('subject');
//            $activity->task = $request->get('task');
//            $activity->ddl = date("Y-m-d", strtotime($request->get('ddl')));
//            $recipient = User::where('email', $request->get('recipient'))->first()->id;
//            if($activity->assigned == $recipient) {
//                $activity->assigned = $recipient;
//            } else {
//                $activity->assigned = $recipient;
//                $activity->reci_status = 0;
//            }
//            if($request->get('mentioned')) {
//                $mentioned = User::where('email', $request->get('mentioned'))->first()->id;
//                if($activity->mentioned == $mentioned) {
//                    $activity->mentioned = $mentioned;
//                } else {
//                    $activity->mentioned = $mentioned;
//                    $activity->ment_status = 0;
//                }
//            }
//            $activity->message = $request->get('message');
//            if($activity->assigned == Sentinel::getUser()->id) {
//                if($request->get('unread') == 1) {
//                    $activity->reci_status = 1;
//                } else {
//                    $activity->reci_status = 0;
//                }
//            }
//            if($activity->mentioned == Sentinel::getUser()->id) {
//                if($request->get('unread') == 1) {
//                    $activity->ment_status = 1;
//                } else {
//                    $activity->ment_status = 0;
//                }
//            }
//            $activity->save();
//        } catch (InvalidArgumentException $e) {
//            print $e;
//        }
//        return redirect('staff');
//    }
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
            if($request->get('case_related')) {
                $activity->related = $request->get('case_related');
            }
            $activity->message = $request->get('message');
            $activity->save();
        } catch (InvalidArgumentException $e) {
            print $e;
        }
        return redirect('staff');
    }
}
