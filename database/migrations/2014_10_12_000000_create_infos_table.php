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
            $table->tinyInteger('page_id');
            $table->char('title',50);
            $table->text('text')->nullable();;
            $table->text('content');
            $table->integer('top');
            $table->dateTime('publish_at');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('infos');
    }
}
