<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempperson', function (Blueprint $table) {
            $table->id();
            $table->string('cup',25)->nullable();
            $table->string('person_type',50)->nullable();
            $table->string('name',100)->nullable();
            $table->string('identification',40)->nullable();
            $table->string('identification_type',40)->nullable();
            $table->string('email',70)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('person_type_dian',50)->nullable();
            $table->string('age',50)->nullable();
            $table->string('ethnic_group',35)->nullable();
            $table->string('disabled',50)->nullable();
            $table->string('gender',25)->nullable();
            $table->string('address',500)->nullable();
            $table->integer('user_id')->nullable();            
            $table->integer('depto_id')->nullable();
            $table->integer('city_id')->nullable();
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
        Schema::dropIfExists('tempperson');
    }
}
