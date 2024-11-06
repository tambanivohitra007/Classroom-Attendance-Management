<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classrooms';
    protected $primaryKey = 'classroom_id';
    protected $fillable = ['classroom_name', 'capacity', 'updated_at'];
    use HasFactory;
}
