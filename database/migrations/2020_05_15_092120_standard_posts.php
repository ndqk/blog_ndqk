<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StandardPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Standard_posts', function (Blueprint $table) {
            $table->bigIncrements('spost_id');
            $table->unsignedBigInteger('spost_category_id');
            $table->foreign('spost_category_id')->references('cate_id')->on('Categories');
            $table->string('spost_title', '256');
            $table->string('spost_slug', '256');
            $table->string('spost_author', '256');
            $table->text('spost_image');
            $table->text('spost_content');
            $table->bigInteger('spost_comment_count');
            $table->string('spost_tag','100');
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
