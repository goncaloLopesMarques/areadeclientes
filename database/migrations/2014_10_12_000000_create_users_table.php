<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('email');
            $table->string('password');
            $table->boolean('excluido');
            $table->dateTime('exclusaoData')->nullable();
            $table->dateTime('ultimoLogin')->nullable();
            $table->boolean('alterouData')->nullable();
            $table->string('idCrm')->unique();
            $table->string('image')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}