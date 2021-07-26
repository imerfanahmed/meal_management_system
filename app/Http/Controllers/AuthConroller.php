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
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //get user
        $user = User::where('email', $request->email)->firstOrFail();
        //check if user exists
        if($user){
            //check if password matches
            if(Hash::check($request->password, $user->password)){
                //login user
               Auth::attempt(['email' => $request->email, 'password' => $request->password]);
                //redirect to dashboard
                return redirect('/dashboard');
            }else{
                //error message
                return redirect('/login')->withErrors(['password' => 'Wrong password']);
            }
        }
        else{
            return redirect('/login')->withErrors(['email' => 'Wrong email']);
        }
    }
}
