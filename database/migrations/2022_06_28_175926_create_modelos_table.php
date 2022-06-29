<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->string('nomeveiculo')->nullable();
            $table->string('versao')->nullable();
            $table->date('data_fabricacao');
            $table->decimal('valor_venda')->nullable();
            $table->string('cor')->nullable();
            $table->integer('portas')->nullable();
            $table->integer('eixos')->nullable();

            // Caracteristicas
            $table->integer('ar_condicionado')->default('0');
            $table->string('direcao_hidraulica');
            $table->integer('airbag')->nullable('0');
            $table->integer('freioabs')->nullable('0');
            $table->integer('rodasligaleve')->nullable('0');
            $table->integer('cambio')->nullable('0');
            $table->integer('multimidia')->nullable('0');
            $table->integer('bancoscouro')->nullable('0');

            $table->unsignedBigInteger('marcas_id');
            $table->foreign('marcas_id')->references('id')->on('marcas')->onDelete('CASCADE');
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
        Schema::dropIfExists('modelos');
    }
}
