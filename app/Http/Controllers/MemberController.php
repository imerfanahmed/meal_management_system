<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\members;

class MemberController extends Controller
{
    //index
    public function index()
    {
        $members = members::all();
        return view('members', compact('members'));
    }
    //controller for adding members using ajax
        public function addMember(Request $request){
            dd($request->all());
        $member = new members();
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->phone_number = $request->input('phone');
        $member->save();
        return response()->json(['status' => 'ok']);
    }
}
