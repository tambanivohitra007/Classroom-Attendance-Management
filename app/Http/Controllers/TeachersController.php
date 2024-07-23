<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teachers;

class TeachersController extends Controller
{
    public function teachers(){
        $teachers = Teachers::all();
        return view('admin.teachers.teachers', ["teachers"=>$teachers]);
    }
}
