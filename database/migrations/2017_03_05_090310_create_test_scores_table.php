<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_scores', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->integer('testId');
            $table->string('testName');
            $table->float('testScore');
            $table->float('testTop');
            $table->float('testBottom');
            $table->enum('testType', ['math', 'english', 'science', 'engineering']);
            $table->enum('testLevel', ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']);
            $table->char('testedYear');
            $table->char('testYear', 4);
            $table->boolean('testActive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_scores');
    }
}