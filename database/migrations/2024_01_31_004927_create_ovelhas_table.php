<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvelhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ovelhas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('brinco');
            $table->text('raca', 50);
            $table->date('data_nascimento');
            $table->text('pai', 50);
            $table->text('mae', 50);
            $table->integer('total_cria');
            $table->char('gemeas', 50);
            $table->char('abate', 50);
            $table->char('abatida', 50);
            $table->char('doente', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ovelhas');
    }
}
