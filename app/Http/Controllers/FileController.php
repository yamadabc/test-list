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
        return view('files.create');
        
    }

    public function store(Request $request)
    {
        $validator=$request->validate([
            'filename' => ['image','mimes:jpeg,png,jpg,bmb','max:2048'],
                 
        ]);
        
        
         
        if($file = $request->filename){
            $name = time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/');
            $file->move($target_path,$name);
            
        }
        
        $request->user()->update([
            'filename'=>$name,
        ]);
        
            

                return back()->with('success','画像が正常にアップロードされました！');
            
        }

        public function edit($id)
        {
            $user = DB::table('users')->find($id)->files;

            return view('files.edit',[
            'user' => $user
            ]);
        }

        public function update(Request $request, $id)
        {
        $request->validate([
            
            'filename' => ['image','mimes:jpeg,png,jpg,bmb','max:2048'],
            
        ]);
        
        
        if($file = $request->file_name){
            $name = time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/');
            $file->move($target_path,$name);
        
        }

            $request->user()->update([
            
            'filename' => $name,
            
        ]);

                return redirect('/users');

    }

}
