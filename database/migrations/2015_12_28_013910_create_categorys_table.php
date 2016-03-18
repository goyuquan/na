<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorysTable extends Migration
{
    public function up()
    {
        Schema::create('categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('parent_id')->->nullable();
        });
    }

    public function down()
    {
        Schema::drop('categorys');
    }
}
