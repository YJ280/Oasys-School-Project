<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        return $this->belongsToMany(ParentModel::class, 'parent_students', 'student_id', 'parent_id');
    }

    public function attendance()
    {
        return $this->hasMany(AttendanceDetail::class);
    }

    public $incrementing = false;

    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $model->id = (string) Str::uuid();

        });

    }


}
