<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    use HasFactory;
    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }
    public function attendance()
    {
        return $this->belongsToMany(User::class, 'attendances', 'class_id', 'student_id')->withPivot('date','is_present','reason');
    }
}
