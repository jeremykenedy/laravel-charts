<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'studentName',
        'studentGrade',
		'studentStartDate',
		'studentEndDate',
		'studentGradYear',
    ];

}