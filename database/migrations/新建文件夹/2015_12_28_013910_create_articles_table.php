<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{

    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->string('title');
            $table->string('thumbnail',20);
            $table->text('content');
            $table->timestamps();
            $table->timestamp('published_at');
        });
    }

    public function down()
    {
        Schema::drop('articles');
    }
}
