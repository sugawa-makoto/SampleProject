<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onsite', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('onsite_name');
            $table->string('weather')->length(3);
            $table->integer('temperature');
            $table->integer('humidity');
            $table->string('work_title');
            $table->text('work_detail');
            $table->integer('people');
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
        Schema::dropIfExists('onsite');
    }
}
