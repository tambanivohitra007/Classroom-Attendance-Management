<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'course_id';
    protected $fillable = ['course_name', 'course_code', 'semester_id', 'credit'];
    use HasFactory;
}
