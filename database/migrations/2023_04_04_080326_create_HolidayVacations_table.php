<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidayVacationsTable extends Migration
{
    public function up()
    {
        Schema::create('HolidayVacation', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('holiday_date');
            $table->date('rest_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('HolidayVacation');
    }
}