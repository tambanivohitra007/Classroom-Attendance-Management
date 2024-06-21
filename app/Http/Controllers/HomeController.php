<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Student;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $students = Student::all();
        if (Auth::user()->user_role=='teacher'){
            return view ('dashboard', compact('students'));
        }else{
            return view('admin.home');
        }
    }
}
