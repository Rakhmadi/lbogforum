<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blogmigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        



        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category');
            $table->timestamps();
        });

        Schema::create('article', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('title_slug');
            $table->text('image_article');
            $table->text('content');
            $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->bigInteger('author_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('author_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tag_name');
            $table->bigInteger('articel_id')->unsigned()->index();
            $table->foreign('articel_id')->references('id')->on('article');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('comment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comment_content');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('article_id')->unsigned()->index();
            $table->foreign('article_id')->references('id')->on('article');
            $table->timestamps();
        });

        Schema::create('react', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('articel_id')->unsigned();
            $table->boolean('like')->default(0);
            $table->foreign('articel_id')->references('id')->on('article');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });



        Schema::create('viewer_counter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('article_id')->unsigned()->index();
            $table->bigInteger('N');
            $table->foreign('article_id')->references('id')->on('article');
            $table->timestamps();
        });
        Schema::create('save_article', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('article_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('article_id')->references('id')->on('article');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::create('folowing_', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('folower_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('folower_id')->references('id')->on('users');
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
        Schema::drop('tag_list','category','article','tag','comment','comment_list');
    }
}
