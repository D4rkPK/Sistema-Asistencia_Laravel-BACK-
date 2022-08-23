<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cui')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono_personal');
            $table->string('telefono');
            $table->string('extension');
            $table->integer('puesto_id');
            $table->integer('area_id');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('puesto_id')->references('id')->on('puesto');
            $table->foreign('area_id')->references('id')->on('area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
