<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table = 'students';
    protected $primaryKey = 'student_id';
    protected $fillable = ['first_name', 'last_name', 'nick_name', 'email', 'image_path', 'group_session', 'student_number', 'updated_at'];
    use HasFactory;
}
