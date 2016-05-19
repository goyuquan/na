<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('parent_id')->nullable();
            $table->string('name',20);
            $table->string('alias',50)->unique();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('categories');
    }
}
