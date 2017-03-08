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
        $users = User::all();

        $i = 0;
        foreach ($activities as $activity) {
            $data[$i]['id'] = $activity->id;
            $data[$i]['sb'] = $activity->subject;
            $data[$i]['ms'] = $activity->message;
            $data[$i]['task'] = $activity->task;
            $data[$i]['ddl'] = date("m-d-Y", strtotime($activity->ddl));
            foreach ($users as $user) {
                if($user->id == $activity->assigned) {
                    $data[$i]['asln'] = $user->last_name;
                    $data[$i]['asfn'] = $user->first_name;
                    break;
                } else {
                    $data[$i]['asln'] = "";
                    $data[$i]['asfn'] = "";
                }
            }
            foreach ($users as $user) {
                if($user->id == $activity->creator) {
                    $data[$i]['crln'] = $user->last_name;
                    $data[$i]['crfn'] = $user->first_name;
                    break;
                } else {
                    $data[$i]['crln'] = "";
                    $data[$i]['crfn'] = "";
                }
            }
            foreach ($users as $user) {
                if($user->id == $activity->mentioned) {
                    $data[$i]['meln'] = $user->last_name;
                    $data[$i]['mefn'] = $user->first_name;
                    break;
                } else {
                    $data[$i]['meln'] = "";
                    $data[$i]['mefn'] = "";
                }
            }
            $data[$i]['related'] = $activity->related;
            $data[$i]['ls'] = date("m-d-Y H:i:s", strtotime($activity->updated_at));
            $i++;
        }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $collection = new Collection($data);
        $perPage = 20;
        $currentPageSearchResults = $collection->slice(($currentPage -1) * $perPage, $perPage)->all();
        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        return view('admin/activity/view', [
            'datas' => $paginatedSearchResults,
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
