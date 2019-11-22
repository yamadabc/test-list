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
        $properties = Property::with('user')->get();
        
        $this_year = date("Y");
        $this_month = date("m");
        
        return view('properties.index',[
            'properties' => $properties,
            
            'this_year' => $this_year,
            'this_month' => $this_month,
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
            'house_number'=>'required|string',
            'price' => 'required|numeric',
            'limit_price' => 'required|numeric',
            
            'full_price' => 'required|numeric',
            'build_year' => 'required|max:191',
            'build_month' => 'required|max:191',
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
            $property -> build_year = $request->input('build_year');
            $property -> build_month = $request->input('build_month');
            $property -> structure = $request->input('structure');
            $property -> user_id = $user_id;
            $property -> save();
       

        return redirect('/properties');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = DB::table('properties')->find($id);
        $name = property::find($id)->user->name;
        $this_year = date("Y");
        $this_month = date("m");
        
        return view('properties.show',[
            'property' => $property,
            'name' => $name,
            'this_year' => $this_year,
            'this_month' => $this_month,
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
        $property = DB::table('properties')->find($id);
        $names = DB::table('users')->pluck('name');
        
        return view('properties.edit',[
            'property' => $property,
            'names' => $names,
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
            'user_name'=>'required|string|max:191',
            'status' => 'max:191',
            'property_name' =>'required|max:191',
            'prefecture' => 'required|string|max:191',
            'town' => 'required|string|max:191',
            'house_number'=>'required|string|max:191',
            'price' => 'required|',
            'limit_price' => 'required|',
            'full_price' => 'required|numeric|',
            'build_year' => 'required|max:191',
            'build_month' => 'required|max:191',
            'structure' =>'required|max:191',
        ]);
        
            
        $user_id = Auth::id();
        $property = Property::find($id);
        $property -> user_name = $request->input('user_name'); 
        $property -> status =$request->input('status');
        $property -> property_name = $request->input('property_name');
        $property -> prefecture = $request->input('prefecture');
        $property -> town = $request->input('town');
        $property -> house_number = $request->input('house_number');
        $property -> price = $request->input('price');
        $property -> limit_price = $request->input('limit_price');
        $property -> full_price = $request->input('full_price');
        $property -> build_year = $request->input('build_year');
        $property -> build_month = $request->input('build_month');
        $property -> structure = $request->input('structure');
        $property -> user_id = $user_id;
        $property -> save();
            
       

                return redirect('/properties');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('properties')->where('id',$id)->delete();

        return redirect('/properties');
    }

    public function delete_check($id)
    {
        $property = DB::table('properties')->find($id);

        return view('properties.delete_check',[
            'property'=>$property,
        ]);
    }
}
