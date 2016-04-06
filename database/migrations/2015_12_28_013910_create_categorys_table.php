<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateCategorysTable extends Migration
{
    public function up()
    {
        Schema::create('categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('parent_id')->nullable();
            $table->string('name',20)->unique();
            $table->string('alias',20)->unique();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('categorys');
    }
}
