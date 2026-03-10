<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceDetail extends Model
{

    protected $fillable = [
        'attendance_id',
        'student_id',
        'status'
    ];

    public function session()
    {
        return $this->belongsTo(AttendanceSession::class, 'attendance_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
