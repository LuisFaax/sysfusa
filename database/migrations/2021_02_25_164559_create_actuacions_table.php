<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActuacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actuaciones', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('radicado_id');        
            $table->foreign('radicado_id')->references('id')->on('radicados');

            $table->string('fecha_registro',25);
            $table->string('sustancia',100)->nullable();
            $table->string('interlocutor',10)->nullable();
            $table->string('sentencia')->nullable();
            $table->text('descripcion',2500)->nullable();
            $table->string('archivo',100)->nullable();

            $table->unsignedBigInteger('actuacion_id');        
            $table->foreign('actuacion_id')->references('id')->on('decisiones_catalogo');

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
        Schema::dropIfExists('actuaciones');
    }
}
