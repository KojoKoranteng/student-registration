<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoureProgrammeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_programmes', function (Blueprint $table) {
            $table->unsignedbigInteger('course_id');
            $table->unsignedbigInteger('programmes_id');

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('programmes_id')->references('id')->on('programmes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coure_programme');
    }
}
