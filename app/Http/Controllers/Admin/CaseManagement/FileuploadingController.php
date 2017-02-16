<?php

namespace App\Http\Controllers\Admin\CaseManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Docs;
use Illuminate\Support\Facades\Storage;

class FileuploadingController extends Controller
{
    //
    public function index(){
        return view('case.upload');
    }
    // create new function for show uploaded page
    public function showfileupload(Request $request){
        $file = $request -> file('image');
        $id = $request->id;
        $type = $request->type;
        // show the file name
        $time = time();
//        echo 'File Name : '.$file->getClientOriginalName();
//        echo '<br>';
        $newName = str_replace('.'.$file->getClientOriginalExtension(), '_'.$time.'.'.$file->getClientOriginalExtension(), $file->getClientOriginalName());
        // show file extensions
//        echo 'File Extensions : '.$file->getClientOriginalExtension();
//        echo '<br>';

        // show file path
//        echo 'File Path : '.$file->getRealPath();
//        echo '<br>';

        // show file size
//        echo 'File Size : '.$file->getSize();
//        echo '<br>';

        // show file mime type
//        echo 'File Mime Type : '.$file->getMimeType();
//        echo '<br>';

        // move uploaded File
        $destinationPath = 'uploads/'.$id;
        $filenewname = 'uploads/'.$id.'/'.$newName;
//        $file->move($destinationPath, $newName);
        Storage::disk('local')->put($filenewname, file_get_contents($file->getRealPath()));
        //save information in database docs
        $doc = new Docs;
        $doc->case_id = $id;
        $doc->type = $request->get('type');
        $doc->title = $request->get('title');
        $doc->description = $request->get('description');
        $doc->uploader = $request->get('uploader');
        $doc->path = $destinationPath;
        $doc->visible = $request->get('visible');
        $doc->filename = $newName;
        $doc->save();
        return redirect('admin/case/'.$id.'/view');
    }
}
