<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePeoples extends Migration
{
    public function up()
    {
        Schema::create('peoples', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('position', 150);
            $table->string('images', 100);
            $table->text('text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('peoples');
    }
}
