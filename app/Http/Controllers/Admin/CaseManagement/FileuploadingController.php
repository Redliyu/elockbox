<?php

namespace App\Http\Controllers\Admin\CaseManagement;

use App\Avatar;
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
    public function uploadAvatar(Request $request) {
        $file = $request->file('avatar');
        $id = $request->id;
        $time = time();
        $newName = str_replace('.'.$file->getClientOriginalExtension(), '_'.$time.'.'.$file->getClientOriginalExtension(), $file->getClientOriginalName());
        $destinationPath = 'uploads/'.$id;
        $filenewname = 'uploads/'.$id.'/'.$newName;
        Storage::disk('local')->put($filenewname, file_get_contents($file->getRealPath()));
        $old_ava = Avatar::where('case_id', $id)->first();
        if($old_ava) {
            $deletepath = "uploads/" . $id . "/". $old_ava->filename;
            Storage::delete($deletepath);
            $old_ava->case_id = $id;
            $old_ava->path = $destinationPath;
            $old_ava->filename = $newName;
            $old_ava->save();
        } else {
            $ava = new Avatar;
            $ava->case_id = $id;
            $ava->path = $destinationPath;
            $ava->filename = $newName;
            $ava->save();
        }
        return redirect('admin/case/'.$id.'/view');
    }
}
