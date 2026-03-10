<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceSession extends Model
{

    protected $fillable = [
        'class_id',
        'teacher_id',
        'date',
        'description'
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function details()
    {
        return $this->hasMany(AttendanceDetail::class, 'attendance_id');
    }

}
