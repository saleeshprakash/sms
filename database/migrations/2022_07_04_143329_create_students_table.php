<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name',80);
            $table->tinyInteger('age');
            $table->enum('gender',['male','female']);
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('reporting_teacher_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('reporting_teacher_id')->references('id')->on('users');
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
