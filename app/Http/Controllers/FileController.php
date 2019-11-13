<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use DB;


class FileController extends Controller
{
    public function index()
    {
        $files = DB::table('files')->get();
        return view('index',compact('files'));
    }

    public function create()
    {
        return view('create');
        
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),
            ['filename'=>'required']);
        if($validator->fails()){
            return back()->withErrors($validator->errors());
        }
       

        if($file = $request->file('filename')){
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/');
            if($file->move($target_path,$name)){
                DB::table('files')->insert(['filename' => $name]);

                return back()->with('success','画像が正常にアップロードされました！');
            }
        }
            
    }
}
