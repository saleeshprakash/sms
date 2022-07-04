<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marklist_id');
            $table->unsignedBigInteger('class_subjects_id');
            $table->unsignedFloat('mark',3,2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('marklist_id')->references('id')->on('marklists');
            $table->foreign('class_subjects_id')->references('id')->on('class_subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
