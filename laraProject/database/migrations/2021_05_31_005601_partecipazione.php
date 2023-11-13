<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class partecipazione extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('partecipazione', function (Blueprint $table)
         {
            $table->string('user2',50)->charset('utf8mb4');
            $table->unsignedInteger('id_evento');
            $table->datetime('data_click')->useCurrent();

            $table->foreign('user2')->references('username')->on('user2');
            $table->foreign('id_evento')->references('id_evento')->on('evento');
            $table->unique(['user2', 'id_evento']);
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
        Schema::dropIfExists('partecipazione');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
