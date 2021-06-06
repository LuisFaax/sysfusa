<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('cup',50);
            $table->ENUM('tipo_persona',['DEMANDANTE','DEMANDADO','APODERADO DEMANDANTE','APODERADO DEMANDADO'])->default('DEMANDANTE');
            $table->string('nombre',80);
            $table->string('identificacion',50);
            $table->string('tipo_identificacion',50);
            $table->string('email',50);
            $table->string('telefono',15);
            $table->enum('tipo_dian',['Natural','Jurídica'])->default('Natural');
            $table->string('edad',25);
            $table->string('grupo',25);            
            $table->enum('discapacitado',['SI','NO'])->default('NO');
            $table->enum('genero',['HOMBRE','MUJER'])->default('HOMBRE');            
            $table->text('direccion',500)->nullable();


            $table->unsignedBigInteger('radicado_id');        
            $table->foreign('radicado_id')->references('id')->on('radicados');

            $table->unsignedBigInteger('depto_id');        
            $table->foreign('depto_id')->references('id')->on('departamentos_catalogo');

            $table->unsignedBigInteger('ciudad_id');        
            $table->foreign('ciudad_id')->references('id')->on('municipios');

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
        Schema::dropIfExists('personas');
    }
}
