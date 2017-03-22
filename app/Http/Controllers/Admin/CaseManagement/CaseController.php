<?php

namespace App\Http\Controllers\Admin\CaseManagement;

use App\Avatar;
use App\CaseAddress;
use App\CaseEmail;
use App\CasePhone;
use App\DocType;
use App\ProgramList;
use App\UserRole;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateCaseFormRequest;
use App\Http\Requests\UpdateCaseFormRequest;
use App\Http\Controllers\Controller;
use Mockery\CountValidator\Exception;
use Sentinel;
use DB;
use App\VrfyCode;
use App\UserProfile;
use App\CreateCase;
use App\User;
use App\Docs;
use Illuminate\Support\Facades\File;
use App\WorkHistory;
use App\EduHistory;
use App\AddContact;
use Illuminate\Support\Facades\Storage;


class CaseController extends Controller
{
    //
    public function create()
    {
        $program_list = ProgramList::all();
        $program_name = null;
        foreach ($program_list as $program) {
            $program_name[$program->id] = $program->program_name;
        }
        return view('admin.case.create', [
            'program_name' => $program_name,
        ]);
    }

    public function store(CreateCaseFormRequest $request)
    {
        try{
            $currentUser = User::where('email', $request->creator)->first();
            $input = $request->only('email', 'first_name', 'last_name', 'birthday', 'gender', 'webpage', 'ssn', 'ilp', 'ethnicity', 'program');
            $case = new CreateCase;
            $case->email = $request->get('email');
            $case->first_name = $request->get('first_name');
            $case->last_name = $request->get('last_name');
            $case->birthday = date("Y-m-d", strtotime($request->get('birthday')));
            $case->gender = $request->get('gender');
            $case->ssn = $request->get('ssn');
            $case->ilp = $request->get('ilp');
            $case->ethnicity = $request->get('ethnicity');
            $case->program = $request->get('program');
            $case->cm_id = $currentUser->id;
            $case->cm_name = $currentUser->first_name . ' ' . $currentUser->last_name;
            $case->save();
            return redirect('admin/case/create')->withFlashMessage('Case Successfully Created and Activated!');
        }catch (QueryException $e) {
            return redirect()->back()->withErrors(array("message" => "Fail to create a case, please check your email."));
        }

    }

    public function view()
    {
//        $data = CreateCase::all()->sortByDesc('id')->paginate(10);
        //orderBy('id','desc')
        $data = CreateCase::orderBy('id', 'desc')->paginate(10);
        $program_list = ProgramList::all();
        $program_name = null;
        foreach ($program_list as $program) {
            $program_name[$program->id] = $program->program_name;
        }
        return view('admin.case.view', [
            'datas' => $data,
            'program_name' => $program_name,
        ]);
    }

    public function viewdetail($id)
    {
        $data = CreateCase::find($id);
        if ($data) {
            $email = $data->email;
            $caseUser = User::where('email', $email)->first();
            $docs = Docs::where('case_id', $id)->get();
            $workhistorys = WorkHistory::where('case_id', $id)->get();
            $eduhistorys = EduHistory::where('case_id', $id)->get();
            $addcontacts = AddContact::where('case_id', $id)->get();
            $cm_id_list = UserRole::where('role_id', 2)->get();
            $ad_id_list = UserRole::where('role_id', 1)->get();
            $all_list = null;
            foreach ($cm_id_list as $cm_id) {
                $cm = User::find($cm_id->user_id);
                $all_list[$cm_id->user_id] = $cm->first_name . ' ' . $cm->last_name;
            }
            foreach ($ad_id_list as $ad_id) {
                $ad = User::find($ad_id->user_id);
                $all_list[$ad_id->user_id] = $ad->first_name . ' ' . $ad->last_name;
            }
            $case_address = CaseAddress::where('case_id', $id)->get();
            $case_phone = CasePhone::where('case_id', $id)->get();
            $case_email = CaseEmail::where('case_id', $id)->get();
            $program_name = null;
            $program_list = ProgramList::all();
            foreach ($program_list as $program) {
                $program_name[$program->id] = $program->program_name;
            }
            $doc_type_name = null;
            $doc_type_abbr = null;
            $doc_type = DocType::all();
            foreach ($doc_type as $doc_name) {
                $doc_type_name[$doc_name->id] = $doc_name->document_type;
                $doc_type_abbr[$doc_name->id] = $doc_name->document_abbr;
            }
            $admins = UserRole::where("role_id", 1)->get();
            $managers = UserRole::where("role_id", 2)->get();
            $staffs = UserRole::where("role_id", 3)->get();
            $avatar = Avatar::where("case_id", $id)->first();
            return view('admin.case.detail', [
                'data' => $data,
                'caseUser' => $caseUser,
                'docs' => $docs,
                'workhistorys' => $workhistorys,
                'eduhistorys' => $eduhistorys,
                'addcontacts' => $addcontacts,
                'all_list' => $all_list,
                'case_address' => $case_address,
                'case_phone' => $case_phone,
                'case_email' => $case_email,
                'program_name' => $program_name,
                'doc_type_name' => $doc_type_name,
                'doc_type_abbr' => $doc_type_abbr,
                'admins' => $admins,
                'managers' => $managers,
                'staffs' => $staffs,
                'avatar' => $avatar,
            ]);
        } else {
            return redirect('error');
        }
    }

    public function update($id, UpdateCaseFormRequest $request)
    {
        $cm_id = $request->get('cm_name');
        $cm = User::where('id', $cm_id)->first();
        $cm_name = $cm->first_name . ' ' . $cm->last_name;
        $case = CreateCase::find($id);
        $case->first_name = $request->get('first_name');
        $case->last_name = $request->get('last_name');
        $case->birthday = date("Y-m-d", strtotime($request->get('birthday')));
        $case->gender = $request->get('gender');
        $case->webpage = $request->get('webpage');
        $case->ssn = $request->get('ssn');
        $case->ilp = $request->get('ilp');
        $case->ethnicity = $request->get('ethnicity');
        $case->program = $request->get('program');
        $case->cm_id = $cm_id;
        $case->cm_name = $cm_name;
        $case->save();
        return redirect('admin/case/' . $id . '/view');
    }

    public function test()
    {
        return view('admin.case.edit');
    }

    public static function active($id)
    {
        $case = CreateCase::find($id);
        $case->status = 1;
        $case->save();
        return redirect('/admin/case/' . $id . '/view');
    }

    public static function inactive($id)
    {
        $case = CreateCase::find($id);
        $case->status = 0;
        $case->save();
        return redirect('/admin/case/' . $id . '/view');
    }

    public function delete($id, Request $request)
    {
        //$id is case id
        $case = CreateCase::find($id);
        $name = $case->first_name . ' ' . $case->last_name;
        if ($request->youth_name == $name) {
            CreateCase::find($id)->delete();
            WorkHistory::where('case_id', $id)->delete();
            EduHistory::where('case_id', $id)->delete();
            AddContact::where('case_id', $id)->delete();
            Docs::where('case_id', $id)->delete();
            $deletepath = "uploads/" . $id;
            Storage::deleteDirectory($deletepath);
            //additional contact delete
            return redirect('/admin/case/view');
        } else {
            return redirect()->back();
        }
    }

    public function createaccount($id)
    {
        $case = CreateCase::find($id);
        return view('admin.case.account', [
            'case' => $case,
        ]);
    }

    public function storeaccount($id, Request $request)
    {
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
        return redirect()->back();
    }

    //Doc
    public function editfile(Request $request)
    {

        $case_id = $request->get('id');
        $doc_id = $request->get('doc_id');
        $doc = Docs::find($doc_id);
//        dd($doc);
        $doc->title = $request->get('title');
        $doc->type = $request->get('type');
        $doc->description = $request->get('description');
        $doc->visible = $request->get('visible');
        $doc->save();
        return redirect('admin/case/' . $case_id . '/view');
    }

    public function deletefile($id)
    {
        $doc = Docs::find($id);
        $doc_path_name = $doc->path . '/' . $doc->filename;
//        File::delete($doc_path_name);
        Storage::delete($doc_path_name);
        $doc->delete();
        return redirect()->back();
    }

    //Work History
    public function storeWorkHistory(Request $request)
    {

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

    public function editWorkHistory($id, Request $request)
    {
        $case_id = $request->get('id');
        $workhistoryid = $id;
        $workhistory = WorkHistory::find($workhistoryid);
        $workhistory->start_date = $request->get('start_date');
        $workhistory->end_date = $request->get('end_date');
        $workhistory->company = $request->get('company');
        $workhistory->address = $request->get('companyaddress');
        $workhistory->industry = $request->get('industry');
        $workhistory->status = $request->get('status');
        $workhistory->save();
        return redirect()->back();
    }

    public function deleteWorkHistory($id)
    {
        $workhistory = WorkHistory::find($id);
        $workhistory->delete();
        return redirect()->back();
    }

    //Edu History
    public function storeEduHistory(Request $request)
    {
        $eduhistory = new EduHistory;
        $eduhistory->case_id = $request->get('id');
        $eduhistory->start_date = $request->get('start_date');
        $eduhistory->end_date = $request->get('end_date');
        $eduhistory->school = $request->get('school');
        $eduhistory->level = $request->get('level');
        $eduhistory->address = $request->get('schooladdress');
        $eduhistory->status = $request->get('status');
        $eduhistory->save();
        return redirect()->back();
    }

    public function editEduHistory($id, Request $request)
    {
        $case_id = $request->get('id');
        $eduhistoryid = $id;
        $eduhistory = EduHistory::find($eduhistoryid);
        $eduhistory->start_date = $request->get('start_date');
        $eduhistory->end_date = $request->get('end_date');
        $eduhistory->school = $request->get('school');
        $eduhistory->level = $request->get('level');
        $eduhistory->address = $request->get('schooladdress');
        $eduhistory->status = $request->get('status');
        $eduhistory->save();
        return redirect()->back();
    }

    public function deleteEduHistory($id)
    {
        $eduhistory = EduHistory::find($id);
        $eduhistory->delete();
        return redirect()->back();
    }

    //additional contacts 
    public function storeAddContacts(Request $request)
    {
        $contact = new AddContact;
        $contact->case_id = $request->get('id');
        $contact->name = $request->get('name');
        $contact->relationship = $request->get('relationship');
        $contact->phone = $request->get('phone');
        $contact->email = $request->get('email');
        $contact->address = $request->get('address');
        $contact->status = $request->get('status');
        $contact->save();
        return redirect()->back();
    }

    public function editAddContacts($id, Request $request)
    {
        $contact = AddContact::find($id);
        $contact->case_id = $request->get('id');
        $contact->name = $request->get('name');
        $contact->relationship = $request->get('relationship');
        $contact->phone = $request->get('phone');
        $contact->email = $request->get('email');
        $contact->address = $request->get('address');
        $contact->status = $request->get('status');
        $contact->save();
        return redirect()->back();
    }

    public function deleteAddContacts($id)
    {
        $contact = AddContact::find($id);
        $contact->delete();
        return redirect()->back();
    }

    //contact information
    public function addAddress(Request $request)
    {
        $address = new CaseAddress;
        $address->case_id = $request->get('id');
        $address->address = $request->get('address');
        $address->city = $request->get('city');
        $address->state = $request->get('state');
        $address->zipcode = $request->get('zipcode');
        $address->status = $request->get('status');
        $address->save();
        return redirect()->back();
    }

    public function editAddress($id, Request $request)
    {
        $address = CaseAddress::find($id);
        $address->address = $request->get('address');
        $address->city = $request->get('city');
        $address->state = $request->get('state');
        $address->zipcode = $request->get('zipcode');
        $address->status = $request->get('status');
        $address->save();
        return redirect()->back();
    }

    public function deleteAddress($id)
    {
        $address = CaseAddress::find($id);
        $address->delete();
        return redirect()->back();
    }

    public function addPhone(Request $request)
    {
        $phone = new CasePhone;
        $phone->case_id = $request->get('id');
        $phone->number = $request->get('number');
        $phone->type = $request->get('type');
        $phone->status = $request->get('status');
        $phone->save();
        return redirect()->back();
    }

    public function editPhone($id, Request $request)
    {
        $phone = CasePhone::find($id);
        $phone->number = $request->get('number');
        $phone->type = $request->get('type');
        $phone->status = $request->get('status');
        $phone->save();
        return redirect()->back();
    }

    public function deletePhone($id)
    {
        $phone = CasePhone::find($id);
        $phone->delete();
        return redirect()->back();
    }

    public function addEmail(Request $request)
    {
        $email = new CaseEmail();
        $email->case_id = $request->get('id');
        $email->email = $request->get('email');
        $email->status = $request->get('status');
        $email->save();
        return redirect()->back();
    }

    public function editEmail($id, Request $request)
    {
        $email = CaseEmail::find($id);
        $email->email = $request->get('email');
        $email->status = $request->get('status');
        $email->save();
        return redirect()->back();
    }

    public function deleteEmail($id)
    {
        $email = CaseEmail::find($id);
        $email->delete();
        return redirect()->back();
    }
}
