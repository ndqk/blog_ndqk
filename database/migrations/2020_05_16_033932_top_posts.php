<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TopPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Top_posts', function (Blueprint $table) {
            $table->bigIncrements('top_id');
            $table->unsignedBigInteger('top_post_id');
            $table->foreign('top_post_id')->references('spost_id')->on('Standard_posts');
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
