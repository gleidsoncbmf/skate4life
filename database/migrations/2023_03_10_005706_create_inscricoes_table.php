<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscricoesTable extends Migration
{
    public function up()
    {
        Schema::create('inscricoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('apelido')->nullable();
            $table->string('email');
            $table->string('telefone');
            $table->string('instagram')->nullable();
            $table->unsignedBigInteger('modalidade_id');
            $table->unsignedBigInteger('categoria_id');
            $table->boolean('pagamento')->default(false);
            $table->unsignedBigInteger('campeonato_id');
            $table->timestamps();

            $table->foreign('modalidade_id')->references('id')->on('modalidades');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('campeonato_id')->references('id')->on('campeonatos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscricoes');
    }
}

