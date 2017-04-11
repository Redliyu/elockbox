<?php

namespace App\Http\Controllers\Admin\SettingsManagement;

use App\CreateCase;
use App\Docs;
use App\DocType;
use App\ProgramList;
use App\Survey;
use App\User;
use App\UserRole;
use App\UserStatus;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Log;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use League\Flysystem\Exception;

class SettingsController extends Controller
{
    //
    public function viewProgramSettings() {
        $program_list = ProgramList::all();
        $program_check = null;
        foreach ($program_list as $program) {
            $case = CreateCase::where('program',$program->id)->first();
            if($case) {
                $program_check[$program->id] = 1;
            } else {
                $program_check[$program->id] = 0;
            }
        }
        return view('admin.settings.program', [
            'program_list' => $program_list,
            'program_check' => $program_check,
        ]);
    }
    public function addProgramSettings(Request $request) {
        $program = new ProgramList;
        $program->program_abbr = $request->get('program_abbr');
        $program->program_name = $request->get('program_name');
        $program->save();
        @Log::info('Program Settings Created: ' . Sentinel::getUser()->email . ' Program Abbreviation: ' . $program->program_abbr);
        return redirect()->back();
    }
    public function editProgramSettings($id, Request $request) {
        $program = ProgramList::find($id);
        $program->program_abbr = $request->get('program_abbr');
        $program->program_name = $request->get('program_name');
        $program->save();
        return redirect()->back();
    }
    public function deleteProgramSettings($id) {
        $program = ProgramList::find($id);
        $program->delete();
        return redirect()->back();
    }
    public function viewDocumentSettings() {
        $doc_type_list = DocType::all();
        $doc_check = null;
        foreach ($doc_type_list as $doc_type) {
            $doc = Docs::where('type', $doc_type->id)->first();
            if($doc) {
                $doc_check[$doc_type->id] = 1;
            } else {
                $doc_check[$doc_type->id] = 0;
            }
        }
        return view('admin.settings.document', [
            'doc_type_list' => $doc_type_list,
            'doc_check' => $doc_check,
        ]);
    }
    public function addDocumentSettings(Request $request) {
        $doc_type = new DocType;
        $doc_type->document_abbr = $request->get('document_abbr');
        $doc_type->document_type = $request->get('document_type');
        $doc_type->save();
        @Log::info('Document Settings Created: ' . Sentinel::getUser()->email . ' Document Abbreviation: ' . $doc_type->document->abbr);
        return redirect()->back();
    }
    public function editDocumentSettings($id, Request $request) {
        $doc_type = DocType::find($id);
        $doc_type->document_abbr = $request->get('document_abbr');
        $doc_type->document_type = $request->get('document_type');
        $doc_type->save();
        return redirect()->back();
    }
    public function deleteDocumentSettings($id) {
        $doc_type = DocType::find($id);
        $doc_type->delete();
        return redirect()->back();
    }
    public function password() {
        $admins = UserRole::where("role_id", 1)->get();
        $managers = UserRole::where("role_id", 2)->get();
        $staffs = UserRole::where("role_id", 3)->get();
        $youths = UserRole::where("role_id", 4)->get();
        return view('admin.settings.password', [
            'admins' => $admins,
            'managers' => $managers,
            'staffs' => $staffs,
            'youths' => $youths,
        ]);
    }
    public function resetPassword(Request $request) {
        try{
            $user_find = User::where('email', $request->user)->first();
            $user_id = $user_find->id;
            $user = Sentinel::findById($user_id);
            Sentinel::update($user, array('password' => $request->password1));
            @Log::info('Password Reset: ' . Sentinel::getUser()->email . ' User: ' . $user_find->email);
            return redirect()->back();
        }catch (Exception $e) {
            return 0;
        }
    }

    public function survey()
    {
        $survey = Survey::all();
        $program_list = ProgramList::all();
        $program_name = null;
        foreach ($program_list as $program) {
            $program_name[$program->id] = $program->program_name;
        }
        return view("admin.settings.survey", [
            'surveys' => $survey,
            'program_name' => $program_name
        ]);
    }

    public function addSurvey(Request $request)
    {
        try{
            $survey = new Survey;
            $survey->link = $request->get('link');
            $survey->description = $request->get('description');
            $survey->program = $request->get('program');
            $survey->save();
            @Log::info('Survey Created: ' . Sentinel::getUser()->email . ' Survey Description: ' . $survey->description);
            return redirect()->back();
        }catch (Exception $e) {
            return 0;
        }
    }

    public function deleteSurvey($id) {
        $survey = Survey::find($id);
        $survey->delete();
        return redirect()->back();
    }

    public function editSurvey($id, Request $request) {
        try{
            $survey = Survey::find($id);
            $survey->link = $request->get('link');
            $survey->description = $request->get('description');
            $survey->program = $request->get('program');
            $survey->save();
            @Log::info('Survey Edited: ' . Sentinel::getUser()->email . ' Survey Description: ' . $survey->description);
            return redirect()->back();
        }catch (Exception $e) {
            return 0;
        }
    }
}
