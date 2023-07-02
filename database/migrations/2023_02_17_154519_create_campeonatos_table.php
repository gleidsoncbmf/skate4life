<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('local');
            $table->date('data');
            $table->string('endereco');
            $table->string('cartaz')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('telefone');
            $table->string('valor');
            $table->string('pix');    
            $table->string('extra 1')->nullable();
            $table->string('extra 2')->nullable();
            $table->string('extra 3')->nullable();
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
        Schema::dropIfExists('campeonatos');
    }
};
