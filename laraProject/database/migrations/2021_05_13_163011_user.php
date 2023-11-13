<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class user extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
        Schema::create('user', function (Blueprint $table){

        $table->string('username',50)->charset('utf8mb4')->unique();
        $table->primary('username');
        $table->string('password',64)->charset('utf8mb4'); 

         });
        
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('user');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');//
    }
}
