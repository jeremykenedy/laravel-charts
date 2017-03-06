<?php


use App\Student;
use App\TestScore;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$students = factory(App\Student::class, 100)->create();

	}

}