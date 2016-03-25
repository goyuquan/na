<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('user_id');
            $table->tinyInteger('category_id');
            $table->char('title',50);
            $table->text('text');
            $table->text('content');
            $table->dateTime('publish_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('infos');
    }
}
