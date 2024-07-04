<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Courses;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $courses = Courses::all();
        if (Auth::user()->user_role=='teacher'){
            return view ('dashboard', ["courses"=>$courses]);
        }else{
            return view('admin.home');
        }
    }
}
