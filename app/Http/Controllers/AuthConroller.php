<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthConroller extends Controller
{
    //create login controller
    public function login(Request $request){
        //create login view
        return view('login');
    }
    //create login controller
    public function login_post(Request $request){

        //login user
       // dd($request->all());
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->withInput()->withErrors(['email' => 'Email or password is incorrect']);
    }

    //create register controller
    public function register(Request $request){
        //create register view
        return view('register');
    }
    //create register controller
    public function register_post(Request $request){
        //create register user
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->intended('/login');
    }

    //create logout controller
    public function logout(){
        Auth::logout();
        return redirect('login');
    }

}
