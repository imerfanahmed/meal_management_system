<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class mealController extends Controller
{
    public function index(){
        return view('dailyMeal',['members'=>User::all()]);
    }
}
