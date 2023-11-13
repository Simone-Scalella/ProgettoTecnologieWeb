<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Province extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('province', function (Blueprint $table)
         {
            $table->increments('id_province');
            $table->string('nome_province',128)->charset('utf8mb4');
            $table->string('sigla_province',5)->charset('utf8mb4');
            $table->string('regione_province',128)->charset('utf8mb4');
            
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
        Schema::dropIfExists('province');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
