<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        $passwords=DB::table('users')->value('password');

        return view('users.index',[
            'users' => $users,
            'passwords'=> $passwords,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = DB::table('users');

        return view('users.create',[
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ([
            'name' => ['required', 'string', 'max:191'],
            'how_to_read' => ['required', 'string','max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'gmail' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'phone_no' => ['required', 'string' ],
            'depart' => ['required'],
            'post' => ['required', 'string','max:191'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request->user()->create([
            'name' => $request->input('name'),
            'how_to_read' => $request->input('how_to_read'),
            'email' => $request->input('email'),
            'gmail' => $request->input('gmail'),
            'phone_no' => $request->input('phone_no'),
            'depart'=> $request->input('depart'),
            'post' => $request->input('post'),
            'password' => $request->input('password'),
            
        ]);

                return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')-> find($id);

        return view('users.show',[
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->find($id);

        return view('users.edit',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['bail','required', 'string', 'max:191'],
            'how_to_read' => ['required', 'string','max:191'],
            'email' => ['required', 'string', 'email', 'max:191'],
            'gmail' => ['required', 'string', 'email', 'max:191'],
            'phone_no' => ['required', 'string' ],
            'depart' => ['required'],
            'post' => ['required', 'string','max:191'],
           
            
        ]);
            
            
            $request->user()->update([
            'name' => $request->input('name'),
            'how_to_read' => $request->input('how_to_read'),
            'email' => $request->input('email'),
            'gmail' => $request->input('gmail'),
            'phone_no' => $request->input('phone_no'),
            'depart'=> $request->input('depart'),
            'post' => $request->input('post'),
            
        ]);

                return redirect('/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = DB::table('users')->where('id',$id)->delete();
            
                

            return redirect('/users');

    }
}
