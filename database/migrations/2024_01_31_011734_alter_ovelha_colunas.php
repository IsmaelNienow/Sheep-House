<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterOvelhaColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  
        Schema::table('ovelhas', function (Blueprint $table) {
            $table->integer('brinco');
            $table->text('raca', 50);
            $table->date('data_nascimento');
            $table->text('pai', 50);
            $table->text('mae', 50);
            $table->integer('total_cria');
            $table->string('gemeas', 2);
            $table->string('abate', 2);
            $table->string('abatida', 2);
            $table->string('doente', 2);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
