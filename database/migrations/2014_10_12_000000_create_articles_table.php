<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('user_id');
            $table->char('title',50);
            $table->text('text');
            $table->text('content');
            $table->dateTime('publish_at');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('articles');
    }
}
