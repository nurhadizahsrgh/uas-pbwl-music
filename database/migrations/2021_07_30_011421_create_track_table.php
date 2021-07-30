<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track', function (Blueprint $table) {
            $table->increments('track_id');
            $table->string('track_name');
            $table->unsignedInteger('artist_id');
            $table->foreign('artist_id')->references('artist_id')->on('artist');
            $table->unsignedInteger('album_id');
            $table->foreign('album_id')->references('album_id')->on('album');
            $table->string('file');
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
        Schema::dropIfExists('track');
    }
}
