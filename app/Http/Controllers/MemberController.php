<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\members;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    //index
    public function index()
    {
        //$members = members::all()->paginate(10);
        return view('memberList', ['members' => DB::table('members')->Paginate(20)]);
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
        $member = members::find($request->id);
        if($member){
            $member->delete();
            return response()->json(['status' => 'ok', 'message' => 'Member deleted successfully', 'data' => $member],200);
        }
        return response()->json(['status' => 'error', 'message' => 'Member not deleted'],400);
    }

    //get a single member details
        public function getMember(Request $request){
        $member = members::find($request->id);
        if($member){
            return response()->json(['status' => 'ok', 'message' => 'Member details fetched successfully', 'data' => $member],200);
        }
        return response()->json(['status' => 'error', 'message' => 'Member details not fetched'],400);
    }


    //update a member
    public function updateMember(Request $request){
        //dd($request->all());
        $info=$request->all();
            $member = members::find($info['id']);

            $member->name = $info['name'];
            $member->phone_number = $info['phone'];
            $member->room_number = $info['room_number'];
            $member->save();
            return response()->json(['status' => 'ok', 'message' => 'Member updated successfully', 'data' => $member],200);

    }

    // public function getTotalBalance(){
    //     $member=members::all();
    //     $total=0;
    //     foreach($member as $m){
    //         $total+=$m->deposit;
    //     }
    //     return $total;
    // }

    //member login
    

}
