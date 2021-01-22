<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_v_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('img')->nullable();
            $table->string('name');
            $table->float('price');
            $table->string('screen');
            $table->string('os');
            $table->string('powerSupply');
            $table->string('other');
            $table->string('demension');
            $table->string('resolution');
            $table->string('connection');
            $table->string('sound');
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
        Schema::dropIfExists('t_v_s');
    }
}
