<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassroomsController extends Controller
{
    public function classrooms(){
        return view('admin.classrooms');
    }
}
