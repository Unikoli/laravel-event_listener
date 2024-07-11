<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register_index(){
        return view('register');
    }
    public function login_index(){
        return view('login');
    }

    public function authenticate(Request $request){
        $credintials=$request->only('email','password');
        if (auth()->attempt($credintials)){
            return redirect('posts')->with('success','login successfully');
        }
        else{
            return redirect()->back()->withErrors([
                'email' => 'invalid email',
                'password' => 'invalid password',

            ]);
        }
    }
    
    public function register_store(Request $request){
        $user=new User();
        $user->name=$request->username;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        return redirect('login')->with('success', 'Operation successful');

    }
}
