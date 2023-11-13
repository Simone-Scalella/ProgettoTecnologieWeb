<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('user2', function (Blueprint $table){
        $table->string('username',50)->charset('utf8mb4')->unique();
        $table->primary('username');
        $table->string('nome',50)->charset('utf8mb4'); 
        $table->string('cognome',50)->charset('utf8mb4'); 
        $table->string('via_residenza',50)->charset('utf8mb4'); 
        $table->unsignedInteger('numero_civ');
        $table->string('citta',50)->charset('utf8mb4'); 
        $table->date('data_nascita');
        
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
        Schema::dropIfExists('user2');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
