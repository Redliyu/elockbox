<?php

namespace App\Http\Controllers\Admin\SettingsManagement;

use App\CreateCase;
use App\Docs;
use App\DocType;
use App\ProgramList;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

}
