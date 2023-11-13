<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user3', function (Blueprint $table){
        $table->string('username',50)->charset('utf8mb4')->unique();
        $table->primary('username'); 
        $table->string('citta', 50)->charset('utf8mb4'); 
        $table->string('tipo_societa', 20)->charset('utf8mb4'); 
        $table->string('nome_organizzazione',50)->charset('utf8mb4'); 

        $table->foreign('username')->references('username')->on('user');

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
        Schema::dropIfExists('user3');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');    
    }
}
