<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:191'],
            'how_to_read' => ['required', 'string','max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'gmail' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'phone_no' => ['required', 'string' ],
            'depart' => ['required'],
            'post' => ['required', 'string','max:191'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'file_name' => ['image','mimes:jpeg,png,jpg,bmb','max:2048'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
        if(!empty($data['file_name'])){
            $file=$data['file_name'];
            $name = time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/');
            $file->move($target_path,$name);
            
        }else{
            $name ="";
        }
        
    
    
    return User::create([
        'name' => $data['name'],
        'how_to_read' => $data['how_to_read'],
        'email' => $data['email'],
        'gmail' => $data['gmail'],
        'phone_no' => $data['phone_no'],
        'depart'=> $data['depart'],
        'post' => $data['post'],
        'password' => Hash::make($data['password']),
        'file_name'=>$name,
    ]);
    
    
        
    }
}
