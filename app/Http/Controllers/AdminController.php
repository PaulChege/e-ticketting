<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    //
    public function  __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function create_admin(Request $request){
        return view('admin.create_admin');
    }
  

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
     public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
 
        $this->create($request->all());
    
        return redirect('/admin/dashboard'); // Change this route to your needs
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role'=> $data['role'],
            'password' => bcrypt($data['password']),
            
        ]);
        
    }
}
