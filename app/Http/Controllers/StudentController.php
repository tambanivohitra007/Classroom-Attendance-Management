<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Courses;

use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function students(){
        return view('students');
    }
}
