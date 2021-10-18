<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Carro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Carros', function (Blueprint $table) {
            $table->id('cdCarro')->unsigned()->unique();
            $table->string('placa');
            $table->string('descricao');
            $table->string('chassi');
            $table->string('combustivel');
            $table->string('lugar');
            $table->string('ano');
            $table->string('leilao');
            $table->string('remark');
            $table->string('descLeilao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Carros');
    }
}
