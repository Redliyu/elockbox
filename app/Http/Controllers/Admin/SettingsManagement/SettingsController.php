<?php

namespace App\Http\Controllers\Admin\SettingsManagement;

use App\CreateCase;
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
        return view('settings.program', [
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
        return view('settings.document');
    }

}
