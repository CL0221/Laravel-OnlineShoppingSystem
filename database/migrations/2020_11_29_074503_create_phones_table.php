<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('img')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->float('price');
            $table->string('screen');
            $table->string('os');
            $table->string('processor');
            $table->string('graphic');
            $table->string('ram');
            $table->string('storage');
            $table->string('battery');
            $table->string('camera_video');
            $table->string('demension');
            $table->string('simSlot');
            $table->string('connection');
            $table->string('audio');
            $table->string('sensors');
            $table->string('warrenty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
