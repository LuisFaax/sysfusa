<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memoriales', function (Blueprint $table) {
            $table->id();
            $table->string('numero',23);
            $table->text('comentario',1000)->nullable();
            $table->string('archivo',100)->nullable();

            $table->unsignedBigInteger('user_id');        
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('radicado_id');        
            $table->foreign('radicado_id')->references('id')->on('radicados');
            
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
        Schema::dropIfExists('memoriales');
    }
}
