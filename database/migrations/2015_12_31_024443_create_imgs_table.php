<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgs', function (Blueprint $table) {
            $table->increments('id');
            $table->char('label',40);
            $table->string('name');
            $table->text('thumbnail');
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
         Schema::drop('imgs');
     }
}
