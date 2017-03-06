<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Student::class, function (Faker\Generator $faker) {

    return [
		'student_id' 		=> $faker->unique()->randomNumber(6),
		'studentName' 		=> $faker->unique()->name,
		'studentGrade' 		=> $faker->numberBetween($min = 1, $max = 12),
		'studentStartDate' 	=> $faker->date($format = 'Y-m-d', $max = 'now'),
		'studentEndDate' 	=> $faker->date($format = 'Y-m-d', $max = 'now'),
		'studentGradYear' 	=> $faker->year($max = 'now')
    ];

});

$factory->define(App\TestScore::class, function (Faker\Generator $faker) {

	$test = getTest();

    return [
        'student_id' => random_int(\DB::table('students')->min('id'), \DB::table('students')->max('id')),
		'testId' 	 => $test['id'],
		'testName' 	 => $test['name'],
		'testScore'  => $faker->numberBetween($min = 0, $max = 100),
		'testTop' 	 => $test['top'],
		'testBottom' => $test['bottom'],
		'testType' 	 => $test['type'],
		'testLevel'  => $faker->numberBetween($min = 1, $max = 12),
		'testedYear' => $faker->numberBetween($min = 2000, $max = 2016),
		'testYear' 	 => $test['year'],
		'testActive' => $test['testActive']
    ];
});

function getTest() {
	$tests = [
		[
			'id' 	 	 => 0005,
			'name' 	 	 => 'US Regional Math Standards',
			'type' 	 	 => 'math',
			'top' 	 	 => 100,
			'bottom' 	 => 0,
			'testActive' => true,
			'year' 		 => '2012'
		],
		[
			'id' 	 	 => 0001,
			'name' 	 	 => 'US Regional Math Standards',
			'type' 	 	 => 'math',
			'top' 	 	 => 100,
			'bottom' 	 => 0,
			'testActive' => false,
			'year' 		 => '1999'
		],
		[
			'id' 	 	 => 0002,
			'name' 	 	 => 'US Regional Science Standards',
			'type' 	 	 => 'science',
			'top' 	 	 => 100,
			'bottom' 	 => 0,
			'testActive' => true,
			'year' 		 => '1995'
		],
		[
			'id' 	 	 => 0003,
			'name' 	 	 => 'US Regional English Standards',
			'type' 	 	 => 'english',
			'top' 	 	 => 100,
			'bottom' 	 => 0,
			'testActive' => true,
			'year' 		 => '2003'
		],
		[
			'id' 	 	 => 0004,
			'name' 	 	 => 'US Regional Engineering Standards',
			'type' 	 	 => 'engineering',
			'top' 	 	 => 100,
			'bottom' 	 => 0,
			'testActive' => true,
			'year' 		 => '2007'
		],
	];
	$selection = '';
	$choose =  mt_rand(0,count($tests) - 1);
	foreach ($tests as $key => $test) {
	    if($choose == $key) {
	    	$selection = $test;
	    }
	}

	return $selection;

}


