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
        return view('memberList', ['members' => $members]);
    }
    //controller for adding members using ajax
        public function addMember(Request $request){
            //dd($request->all());

          $info = $request->validate([
                'id' => 'unique:members|max:8',
                'name' => 'required|max:50',
                'email' => 'required|max:50|unique:members',
                'phone' => 'required|max:20',
                'room_number' => 'max:10',
                'deposit' => 'max:10',
            ]);

       if($info){
        $member = new members();
        $member->id = $info['id'];
        $member->name = $info['name'];
        $member->email = $info['email'];
        $member->phone_number = $info['phone'];
        $member->room_number = $info['room_number'];
        $member->deposit = $info['deposit'];
        $member->save();
        return response()->json(['status' => 'ok', 'message' => 'Member added successfully', 'data' => $member],200);
       }

       return response()->json(['status' => 'error', 'message' => 'Member not added'],400);
    }

}
