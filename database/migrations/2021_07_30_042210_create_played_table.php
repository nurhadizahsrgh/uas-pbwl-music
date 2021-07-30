<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('played', function (Blueprint $table) {
            $table->unsignedInteger('artist_id');
            $table->foreign('artist_id')->references('artist_id')->on('artist');
            $table->unsignedInteger('album_id');
            $table->foreign('album_id')->references('album_id')->on('album');
            $table->unsignedInteger('track_id');
            $table->foreign('track_id')->references('track_id')->on('track');
            $table->timestamp('played');
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
        Schema::dropIfExists('played');
    }
}
