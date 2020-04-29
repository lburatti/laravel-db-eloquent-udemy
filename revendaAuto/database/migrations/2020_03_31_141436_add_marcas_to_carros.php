<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMarcasToCarros extends Migration
{
    public function up()
    {
        Schema::table('carros', function (Blueprint $table) {
            $table->integer('marca_id')->unsigned()->default(1)->after('id');
            $table->foreign('marca_id')->references('id')->on('marcas');
        });
    }

    public function down()
    {
        Schema::table('carros', function (Blueprint $table) {
            $table->dropForeign('carros_marca_id_foreign');
            $table->dropColumn('marca_id');
        });
    }
}
