<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('parent_id')->nullable();
            $table->string('name',20)->unique();
            $table->string('alias',20)->unique();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('pages');
    }
}
