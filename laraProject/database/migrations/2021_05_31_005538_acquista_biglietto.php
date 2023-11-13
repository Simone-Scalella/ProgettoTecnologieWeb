<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AcquistaBiglietto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acquisto_biglietto', function (Blueprint $table)
        {
            $table->string('user2',50)->charset('utf8mb4');
            $table->unsignedInteger('id_evento');
            $table->unsignedInteger('quantita');
            $table->datetime('data_acquisto')->useCurrent();
            $table->string('tipo_pagamento',30)->charset('utf8mb4');
            $table->decimal('costo',6,2);
            $table->Integer('id_acquisto')->autoIncrement()->unsigned();
            
            $table->foreign('user2')->references('username')->on('user2');
            $table->foreign('id_evento')->references('id_evento')->on('evento');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('acquisto_biglietto');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
