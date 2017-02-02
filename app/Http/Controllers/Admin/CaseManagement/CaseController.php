<?php

namespace App\Http\Controllers\Admin\CaseManagement;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateCaseFormRequest;
use App\Http\Requests\UpdateCaseFormRequest;
use App\Http\Controllers\Controller;
use Sentinel;
use DB;
use App\VrfyCode;
use App\UserProfile;
use App\CreateCase;
use App\User;
use App\Docs;
use Illuminate\Support\Facades\File;
use App\WorkHistory;


class CaseController extends Controller
{
    //
    public function create() {
        return view('case.create');
    }

    public function store(CreateCaseFormRequest $request) {
        $input = $request->only('email', 'first_name', 'last_name', 'birthday', 'gender', 'webpage', 'ssn', 'ilp', 'ethnicity', 'program');
        $case = new CreateCase;
        $case->email = $request->get('email');
        $case->first_name = $request->get('first_name');
        $case->last_name = $request->get('last_name');
        $case->birthday = date("Y-m-d", strtotime($request->get('birthday')));
        $case->gender = $request->get('gender');
        $case->webpage = $request->get('webpage');
        $case->ssn = $request->get('ssn');
        $case->ilp = $request->get('ilp');
        $case->ethnicity = $request->get('ethnicity');
        $case->program = $request->get('program');
        $case->save();
        return redirect('admin/case/create')->withFlashMessage('Case Successfully Created and Activated!');
    }

    public function view() {
//        $data = CreateCase::all()->sortByDesc('id')->paginate(10);
        //orderBy('id','desc')
        $data = CreateCase::orderBy('id', 'desc')->paginate(10);
        return view('case.view', [
            'datas' => $data,
        ]);
    }
    public function viewdetail($id) {
        $data = CreateCase::find($id);
        $email = $data->email;
        $caseUser = User::where('email', $email)->first();
        $docs = Docs::where('case_id', $id)->get();
        $workhistorys = WorkHistory::where('case_id', $id)->get();
        return view('case.detail', [
            'data' => $data,
            'caseUser' => $caseUser,
            'docs' => $docs,
            'workhistorys' => $workhistorys,
        ]);
    }
    public function editdetail($id) {
        $data = CreateCase::find($id);
        return view('case.edit', [
            'data' => $data,
        ]);
    }
    public function update($id, UpdateCaseFormRequest $request) {
        $case = CreateCase::find($id);
        $case->first_name = $request->get('first_name');
        $case->last_name = $request->get('last_name');
        $case->birthday = $request->get('birthday');
        $case->gender = $request->get('gender');
        $case->webpage = $request->get('webpage');
        $case->ssn = $request->get('ssn');
        $case->ilp = $request->get('ilp');
        $case->ethnicity = $request->get('ethnicity');
        $case->program = $request->get('program');
        $case->save();
        return redirect('admin/case/'. $id . '/view');
    }
    public function test() {
        return view('case.edit');
    }

    public static function active($id) {
        $case = CreateCase::find($id);
        $case->status = 1;
        $case->save();
        return redirect('/admin/case/'.$id.'/view');
    }

    public static function inactive($id) {
        $case = CreateCase::find($id);
        $case->status = 0;
        $case->save();
        return redirect('/admin/case/'.$id.'/view');
    }

    public function delete($id) {
        CreateCase::find($id)->delete();
        return redirect('/admin/case/view');
    }

    public function createaccount($id) {
        $case = CreateCase::find($id);
        return view('case.account', [
            'case' => $case,
        ]);
    }

    public function storeaccount($id, Request $request) {
        $case = CreateCase::find($id);
        $first_name = $case->first_name;
        $last_name = $case->last_name;
        $email = $case->email;
        $credentials = [
            'email' => $email,
            'password' => $request->get('password'),
            'first_name' => $first_name,
            'last_name' => $last_name,
        ];
        $user = Sentinel::registerAndActivate($credentials);

        $userrole = Sentinel::findRoleByName('Youths');
        $userrole->users()->attach($user);

        //find user id
        $user_id = Sentinel::findByCredentials(['login' => $email])->id;
//        $user_id = DB::table('users')->where('email', $email)->first()->id;
        $default_code = 100000000;
        //save user id and default code into code table
        $newcode = new VrfyCode;
        $newcode->user_id = $user_id;
        $newcode->code = $default_code;
        $newcode->save();

        $newprofile = new UserProfile;
        $newprofile->user_id = $user_id;
        $newprofile->phone_number = $request->get('phone_number');
        $newprofile->address1 = $request->get('address1');
        $newprofile->address2 = $request->get('address2');
        $newprofile->city = $request->get('city');
        $newprofile->state = $request->get('state');
        $newprofile->zip = $request->get('zip');
        $newprofile->save();
    }

    public function editfile(Request $request) {
        $case_id = $request->get('id');
        $doc_id = $request->get('doc_id');
        $doc = Docs::find($doc_id);
//        dd($doc);
        $doc->title = $request->get('title');
        $doc->type = $request->get('type');
        $doc->description = $request->get('description');
        $doc->save();
        return redirect('admin/case/'.$case_id.'/view');
    }
    public function deletefile($id) {
        $doc = Docs::find($id);
        $doc_path_name = $doc->path.'/'.$doc->filename;
        File::delete($doc_path_name);
        $doc->delete();
        return redirect()->back();
    }
    public function storeWorkHistory(Request $request) {
        $workhistory = new WorkHistory;
        $workhistory->case_id = $request->get('id');
        $workhistory->start_date = $request->get('start_date');
        $workhistory->end_date = $request->get('end_date');
        $workhistory->company = $request->get('company');
        $workhistory->address = $request->get('companyaddress');
        $workhistory->industry = $request->get('industry');
        $workhistory->status = $request->get('status');
        $workhistory->save();
        return redirect()->back();
    }
}
