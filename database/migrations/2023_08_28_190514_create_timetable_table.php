<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetableTable extends Migration
{
    public function up()
    {
        Schema::create('timetable', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('staff_id');
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('timetable');
    }
}
