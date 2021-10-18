<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Debito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('Debitos', function (Blueprint $table) {
            $table->id('cdDebito')->unsigned()->unique();
            $table->string('tipo');
            $table->double('valor');
            $table->string('descricao');

            $table->unsignedBigInteger('cdCarro');
            $table->foreign('cdCarro')->references('cdCarro')->on('Carros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Debitos');
    }
}
