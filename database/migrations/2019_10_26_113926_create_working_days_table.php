<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        
        Schema::create('working_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->datetime('start_time') ->nullable();
            $table->datetime('end_time') ->nullable();
            $table->datetime('today');
            $table->integer('year');
            $table->integer('month');
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
        Schema::dropIfExists('working_days');
    }
}
