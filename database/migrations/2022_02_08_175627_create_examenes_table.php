<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sesione_id')->nullable();
            $table->foreign('sesione_id')->references('id')->on('sesiones');
            $table->string('titulo');
            $table->text('descripcion');
            $table->boolean('is_active')->default(true);
            $table->dateTime('hora_inicio');
            $table->time('duracion');
            $table->dateTime('hora_fin');
            $table->string("url")->nullable();
            $table->string("url2")->nullable();
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
        Schema::dropIfExists('examenes');
    }
}
