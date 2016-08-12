<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use Auth;

use App\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function upload()
    {
        return view('upload');
    }

    public function uploadFile(Request $request)
    {
        $this->validate($request, [
            'file_name' => 'required|string',
            'file' => 'required|file',
        ]);
        $destinationPath = '../storage/files'; // upload path
        $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111,99999).'.'.$extension; // renameing image
        Input::file('file')->move($destinationPath, $fileName); // uploading file to given path

        $file = new File();
        $file->user_id = Auth::user()->id;
        $file->file_name = $request->file_name;
        $file->file_path = $destinationPath.'/'.$fileName;
        $file->save();

        // sending back with message
        echo 'Upload successfully';
    }

}
