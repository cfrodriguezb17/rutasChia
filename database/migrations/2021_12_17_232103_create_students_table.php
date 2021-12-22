<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            // Acudiente del estudiante = 'user'
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('ride');
            $table->unsignedBigInteger('school');

            $table->string('names');
            $table->string('surnames');
            // Tipo de identificacion = 'type_id'
            $table->string('type_id');
            // Numero de identificacion = 'dni'
            $table->string('dni')->unique();
            $table->string('birth_date');
            $table->string('gender');
            $table->string('grade');
            $table->string('course');
            $table->string('session');
            $table->string('education');
            $table->string('address');
            $table->string('image')->default('students/default.jpg');
            

            $table->timestamps();

            $table->foreign('user')->references('id')->on('users');
            $table->foreign('ride')->references('id')->on('rides');
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
        Schema::dropIfExists('students');
    }
}
