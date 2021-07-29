<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use Error;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthConroller extends Controller
{
    //create login controller
    public function login(){
        //create login view
        return view('auth.login');
    }
    //create login controller
    public function login_post(Request $request){

        //login user
       // dd($request->all());
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('/');
        }
        return redirect()->back()->withInput()->withErrors(['error' => 'Email or password is incorrect']);
    }

    //create register controller
    public function register(){
        //create register view
        return view('auth.register');
    }
    //create register controller
    public function register_post(Request $request){
        //create register user
        $info = $request->validateWithBag('error',[
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        if($info){
            $user = new User();
            $user->name = $info['username'];
            $user->email = $info['email'];
            $user->password = Hash::make($info['password']);
            $user->save();

            Auth::attempt(['email' => $info['email'], 'password' => $info['password']]);
            return redirect('/');

        }
        return redirect()->back()->withInput();


    }

    //create logout controller
    public function logout(){
        Auth::logout();
        return redirect('/');;
    }

}
