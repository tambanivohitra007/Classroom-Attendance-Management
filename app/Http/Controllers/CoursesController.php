<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Courses;

use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    function courses(){
        $courses=Courses::all();
        return view('dashboard',["courses"=>$courses]);
    }

}
