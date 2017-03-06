<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unique()->index();
            $table->string('studentName');
            $table->enum('studentGrade', ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']);
            $table->date('studentStartDate');
            $table->date('studentEndDate');
            $table->char('studentGradYear', 4);
            $table->nullableTimestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}