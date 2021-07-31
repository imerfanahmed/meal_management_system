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

        $member = new members();
        $member->name = $request['name'];
        $member->email = $request['email'];
        $member->phone_number = $request['phone'];
        $member->save();
        return response()->json(['status' => 'ok', 'message' => 'Member added successfully', 'data' => $member]);
    }

}
