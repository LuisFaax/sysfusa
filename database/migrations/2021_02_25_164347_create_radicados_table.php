<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadicadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {      

        Schema::create('radicados', function (Blueprint $table) {
            $table->id();
            $table->string('cup',50);                        
            $table->enum('tipo',['PRIMERA INSTANCIA','ÚNICA INSTANCIA'])->default('PRIMERA INSTANCIA');            
            $table->string('fecha_radicar',25);
            $table->string('fecha_presenta',25);
            $table->string('numero',30)->nullable();
            $table->string('cuaderno',30);
            $table->string('folios',40);          
            $table->enum('estatus',['Abierta','Cerrada'])->default('Abierta');          
            $table->text('descripcion',2500)->nullable();


            $table->unsignedBigInteger('juzgado_id');        
            $table->foreign('juzgado_id')->references('id')->on('departamentos_catalogo');

            $table->unsignedBigInteger('depto_id');        
            $table->foreign('depto_id')->references('id')->on('departamentos_catalogo');

            $table->unsignedBigInteger('municipio_id');        
            $table->foreign('municipio_id')->references('id')->on('municipios');

            $table->unsignedBigInteger('entidad_id');        
            $table->foreign('entidad_id')->references('id')->on('entidades_catalogo');

            $table->unsignedBigInteger('tipo_proceso_id');        
            $table->foreign('tipo_proceso_id')->references('id')->on('procesos_catalogo');

            $table->unsignedBigInteger('user_id');        
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('radicados');
    }
}
