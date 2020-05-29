<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Banners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Banners', function (Blueprint $table) {
            $table->bigIncrements('banner_id');
            $table->unsignedBigInteger('banner_post_id');
            $table->foreign('banner_post_id')->references('spost_id')->on('Standard_posts');
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
        //
    }
}
