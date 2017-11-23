<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_disciplines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('discipline_title');
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('teacher_id');
            $table->unsignedInteger('hours');
            $table->foreign('teacher_id')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('groups');
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
        Schema::dropIfExists('academic_disciplines');
    }
}
