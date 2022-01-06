<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();

            // Representante de la ruta = 'user' 
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('car');
            $table->unsignedBigInteger('school');

            // Numero de la ruta = 'number'
            $table->string('number');
            $table->string('sector');
            $table->string('session');

            $table->timestamps();

            $table->foreign('user')->references('id')->on('users');
            $table->foreign('car')->references('id')->on('cars');
            $table->foreign('school')->references('id')->on('schools');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
}
