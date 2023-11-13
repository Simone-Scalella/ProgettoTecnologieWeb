<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class evento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
        Schema::create('evento', function (Blueprint $table){
            
        $table->unsignedInteger('id_evento')->autoIncrement()->unsigned();
        $table->string('nome_evento',30)->charset('utf8mb4');
        $table->datetime('data_evento');
        $table->unsignedSmallInteger('durata');
        $table->string('immagine',40);
        $table->decimal('incasso_evento',9,3);
        $table->decimal('prezzo_unitario',9,3);
        $table->unsignedInteger('numero_biglietti');
        $table->string('indirizzo_evento',60);
        $table->string('citta',50);
        $table->string('provincia',2);
        $table->string('regione',50);
        $table->text('descrizione',3000)->charset('utf8mb4');
        $table->string('organizzatore',50)->charset('utf8mb4');
        $table->datetime('data_sconto')->default(DB::raw('CURRENT_TIMESTAMP'));//`data_sconto` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        $table->decimal('prezzo_scontato',9,3);
        $table->decimal('sconto',9,3);
        $table->text('indicazioni',3000)->charset('utf8mb4');
        $table->text('programma',3000)->charset('utf8mb4');


        $table->foreign('organizzatore')->references('username')->on('user3');
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
        Schema::dropIfExists('evento');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        //
    }
}
