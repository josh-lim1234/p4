<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_photo', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('photo_id')->unsigned();
            $table->integer('diet_id')->unsigned();

            $table->foreign('photo_id')->references('id')->on('photos');
            $table->foreign('diet_id')->references('id')->on('diets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_photo');
    }
}
