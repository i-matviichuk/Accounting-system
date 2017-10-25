<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinesGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplines_groups', function (Blueprint $table) {
            $table->unsignedInteger('discipline_id');
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('hours');
            $table->foreign('discipline_id')->references('id')->on('academic_disciplines');
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
        Schema::dropIfExists('disciplines_groups');
    }
}
