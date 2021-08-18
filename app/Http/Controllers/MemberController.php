<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class MemberController extends Controller
{
    //index
    public function index()
    {
        //$members = members::all()->paginate(10);
        return view('memberList', ['members' => User::where('isManager','!=','1')->Paginate(10)]);
    }
    //controller for adding members using ajax
        public function addMember(Request $request){
            //dd($request->all());

          $info = $request->validate([
                'id' => 'unique:users|max:8',
                'name' => 'required|max:50',
                'email' => 'required|max:50|unique:users',
                'phone' => 'required|max:20',
                'room_number' => 'max:10',
                'deposit' => 'max:10',
            ]);

       $password = Str::random(10);

       if($info){
        $member = new User();
        $member->id = $info['id'];
        $member->name = $info['name'];
        $member->email = $info['email'];
        $member->password = Hash::make($password);
        $member->phone_number = $info['phone'];
        $member->room_number = $info['room_number'];
        $member->deposit = $info['deposit'];
        $member->save();
        Mail::to($info['email'])->send(new \App\Mail\newMember($member->name,$password));

        // $deposit=members::all();
        // $total=0;
        // foreach($deposit as $m){
        //     $total+=$m->deposit;
        // }
        return response()->json(['status' => 'ok', 'message' => 'Member added successfully', 'data' => $member],200);
       }

       return response()->json(['status' => 'error', 'message' => 'Member not added'],400);
    }

    //deleting a member
        public function deleteMember(Request $request){
        $member = User::find($request->id);
        if($member){
            $member->delete();
            return response()->json(['status' => 'ok', 'message' => 'Member deleted successfully', 'data' => $member],200);
        }
        return response()->json(['status' => 'error', 'message' => 'Member not deleted'],400);
    }

    //get a single member details
        public function getMember(Request $request){
        $member = User::find($request->id);
        if($member){
            return response()->json(['status' => 'ok', 'message' => 'Member details fetched successfully', 'data' => $member],200);
        }
        return response()->json(['status' => 'error', 'message' => 'Member details not fetched'],400);
    }


    //update a member
    public function updateMember(Request $request){
        //dd($request->all());
        $info=$request->all();
            $member = User::find($info['id']);

            $member->name = $info['name'];
            $member->phone_number = $info['phone'];
            $member->room_number = $info['room_number'];
            $member->save();
            return response()->json(['status' => 'ok', 'message' => 'Member updated successfully', 'data' => $member],200);

    }

    // public function getTotalBalance(){
    //     $member=User::all();
    //     $total=0;
    //     foreach($member as $m){
    //         $total+=$m->deposit;
    //     }
    //     return $total;
    // }

    //member login


}
