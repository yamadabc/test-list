<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Property;
use Auth;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = DB::table('properties')->get();

        return view('properties.index',[
            'properties' => $properties,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property = DB::table('properties');
        $names = DB::table('users')->pluck('name');

        return view('properties.create',[
            'property' => $property,
            'names' => $names,
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
        $request->validate([
            'user_name'=>'required|string|max:191',
            'status' => 'max:191',
            'property_name' =>'required|max:191',
            'prefecture' => 'required|string|max:191',
            'town' => 'required|string|max:191',
            'house_number'=>'required|string|max:191',
            'price' => 'required|max:191',
            'limit_price' => 'required|max:191',
            'full_price' => 'required|max:191',
            'age' => 'required|max:191',
            'structure' =>'required|max:191',
        ]);

        $user_id = Auth::id();
            $property = new Property;
            $property -> user_name = $request->input('user_name'); 
            $property -> status =$request->input('status');
            $property -> property_name = $request->input('property_name');
            $property -> prefecture = $request->input('prefecture');
            $property -> town = $request->input('town');
            $property -> house_number = $request->input('house_number');
            $property -> price = $request->input('price');
            $property -> limit_price = $request->input('limit_price');
            $property -> full_price = $request->input('full_price');
            $property -> age = $request->input('age');
            $property -> structure = $request->input('structure');
            $property -> user_id = $user_id;
            $property -> save();
       

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
