<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

protected $fillable = [
'name',
'nisn',
'class_id',
'status'
];

public function class()
{
return $this->belongsTo(ClassModel::class);
}

public function parents()
{
return $this->belongsToMany(ParentModel::class,'parent_students','student_id','parent_id');
}

public function attendance()
{
return $this->hasMany(AttendanceDetail::class);
}

}
