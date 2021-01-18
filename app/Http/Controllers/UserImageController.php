<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserImage;
use App\Models\UserImageCount;
use Illuminate\Support\Facades\File;

class UserImageController extends Controller
{
    private $image_path;

    public function __construct() {
        $this->image_path = public_path().'/image_uploads/';
        if (! File::exists($this->image_path)) {
            File::makeDirectory($this->image_path, $mode = 0777, true, true);
        }
    }

    public function uploadFiles(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'filenames' => 'required',
            'filenames.*' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);

        $user_name = $request->input('username');

        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $file_name = time().'.'.$file->extension();
                $file->move($this->image_path , $file_name);
                $data[] = array('user_name' => $user_name, 'image_name' => $file_name);
            }
        }

        UserImage::insert($data);

        return back()->with('success', 'File(s) saved successfully against username !');
    }
}