<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SemestersController extends Controller
{
    public function semesters(){
        return view('admin.semesters');
    }
}
