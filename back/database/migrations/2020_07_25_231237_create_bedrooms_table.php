<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bedrooms', function (Blueprint $table) {
            $table->id();
            $table->integer('totalBed')->unsigned();
            $table->boolean('haveBathroom');
            $table->boolean('haveTv');
            $table->boolean('haveAirConditioner');
            //foreign key
            $table->unsignedBigInteger('republic_id')->nullable();
            $table->timestamps();
        });

        Schema::table('bedrooms', function(Blueprint $table) {
            $table->foreign('republic_id')->references('id')->on('republics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bedrooms');
    }
}
