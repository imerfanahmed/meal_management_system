<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class mealController extends Controller
{
    public function index(){
        $users=User::with('meals')->get();
        return view('dailyMeal')->with('members',$users);
    }
}
