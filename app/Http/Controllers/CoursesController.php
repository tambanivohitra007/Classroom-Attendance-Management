<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Courses;

use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function courses(){
        return view('admin.courses');
    }

}
