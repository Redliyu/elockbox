<?php

namespace App\Http\Controllers\Admin\CaseManagement;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateCaseFormRequest;
use App\Http\Requests\UpdateCaseFormRequest;
use App\Http\Controllers\Controller;
use Sentinel;
use App\CreateCase;

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
        $case->birthday = $request->get('birthday');
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
        return view('case.detail', [
            'data' => $data,
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
}
