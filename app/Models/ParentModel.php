<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{

protected $table='parents';

protected $fillable=[
'user_id',
'phone'
];

public function user()
{
return $this->belongsTo(User::class);
}

public function children()
{
return $this->belongsToMany(Student::class,'parent_students','parent_id','student_id');
}

}