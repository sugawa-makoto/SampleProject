<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewWorkingDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('view_working_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id') ->nullable();
            $table->datetime('start_time') ->nullable();
            $table->datetime('end_time') ->nullable();
            $table->datetime('today') ->nullable();
            $table->string('youbi') ->nullable();
            $table->string('yasumi_name') ->nullable();
            $table->integer('year') ->nullable();
            $table->integer('month') ->nullable();
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
        Schema::dropIfExists('view_working_days');
    }
}
