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
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('excluido');
            $table->dateTime('exclusaoData')->nullable();
            $table->dateTime('ultimoLogin')->nullable();
            $table->dateTime('alterouData')->nullable();
            $table->string('idCrm')->unique();
            $table->string('image')->nullable();
            $table->ipAddress('ip');
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