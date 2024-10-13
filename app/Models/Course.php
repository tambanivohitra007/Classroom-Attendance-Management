<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'course_id';
    protected $fillable = ['course_name', 'course_code', 'semester_id', 'credit', 'updated_at'];

    public function semester() {
        return $this->belongsTo(Semester::class, 'semester_id', 'semester_id');
    }

    use HasFactory;
}
