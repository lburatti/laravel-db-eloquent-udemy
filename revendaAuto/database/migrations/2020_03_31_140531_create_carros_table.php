<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrosTable extends Migration
{
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('descricao');
            $table->integer('ano');
            $table->decimal('valor', 5,2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carros');
    }
}
