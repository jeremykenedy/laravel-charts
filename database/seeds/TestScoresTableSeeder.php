<?php

use App\Student;
use App\TestScore;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TestScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     	$testScores = factory(App\TestScore::class, 5000)->create();

    }
}
