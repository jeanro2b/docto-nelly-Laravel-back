<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->time('firstStartMorning');
            $table->time('firstEndMorning');
            $table->time('secondStartMorning');
            $table->time('secondEndMorning');
            $table->time('thirdStartMorning');
            $table->time('thirdEndMorning');
            $table->time('firstStartEvening');
            $table->time('firstEndEvening');
            $table->time('secondStartEvening');
            $table->time('secondEndEvening');
            $table->time('thirdStartEvening');
            $table->time('thirdEndEvening');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slots');
    }
};
