<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestScore extends Model
{

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['Student'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'student_id',
 	    'testId',
        'testName',
        'testScore',
        'testTop',
        'testBottom',
        'testType',
        'testLevel',
        'testedYear',
        'testYear',
        'testActive'
    ];

	public function student()
	{
		return $this->belongsTo('App\Student');
	}

}