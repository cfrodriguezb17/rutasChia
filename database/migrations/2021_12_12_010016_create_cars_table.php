<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            // Representante del carro = user
            $table->unsignedBigInteger('user');

            $table->string('brand');
            // Modelo de la marca = mob
            $table->string('mob');
            $table->string('year');
            $table->string('plate')->default('ABC123');
            $table->string('company');
            $table->string('image')->default('cars/default-car.jpg');

            $table->timestamps();
            $table->foreign('user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
