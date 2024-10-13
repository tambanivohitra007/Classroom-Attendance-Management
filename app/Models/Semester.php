<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semesters';
    protected $primaryKey = 'semester_id';
    protected $fillable = ['semester_name', 'start_date', 'end_date', 'updated_at'];

    public function courses() {
        return $this->hasMany(Course::class, 'semester_id', 'semester_id');
    }

    use HasFactory;
}
