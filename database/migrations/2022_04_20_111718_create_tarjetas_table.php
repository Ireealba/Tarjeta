<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarjetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjetas', function (Blueprint $table) {
            $table->id();

            $table->string('name_tarjeta')->nullable();
            $table->string('name');
            $table->string('last_name');
            $table->text('description')->nullable();
            $table->string('puesto_trabajo')->nullable();
            $table->string('empresa')->nullable();
            $table->string('tlf1');
            $table->string('tlf2')->nullable();
            $table->string('tlf3')->nullable();
            $table->string('email1');
            $table->string('email2')->nullable();
            $table->string('email3')->nullable();
            $table->string('location')->nullable();
            $table->string('cod_postal')->nullable();
            $table->string('local')->nullable();
            $table->string('nacional')->nullable();
            $table->string('social1')->nullable();
            $table->string('social2')->nullable();
            $table->string('social3')->nullable();
            $table->string('website1')->nullable();
            $table->string('website2')->nullable();
            $table->string('website3')->nullable();

            $table->string('url')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('tarjetas');
    }
}
