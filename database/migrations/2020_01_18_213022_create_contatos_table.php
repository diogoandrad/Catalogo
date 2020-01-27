<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 60);
            $table->string('lagradouro', 40);
            $table->string('numero', 10);
            $table->string('bairro', 40);
            $table->string('cidade', 40);
            $table->string('estado', 40);
            $table->string('telefone', 20);
            $table->string('email', 40);
            $table->string('sexo', 40);
            $table->string('nascimento', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contatos');
    }
}
