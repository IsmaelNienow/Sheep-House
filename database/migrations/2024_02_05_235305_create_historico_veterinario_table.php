<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoVeterinarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_veterinario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ovelha');
            $table->text('sintomas', 50);
            $table->text('tratamento', 50);
            $table->date('data_tratamento');
            $table->timestamps();

            $table->foreign('id_ovelha')->references('id')->on('ovelhas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historico_veterinario');
    }
}
