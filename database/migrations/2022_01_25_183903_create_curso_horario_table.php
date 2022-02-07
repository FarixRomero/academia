<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoHorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->unsignedInteger('horario_id');
            $table->foreign('horario_id')->references('id')->on('horarios');
            $table->string('name');
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('curso_horarios');
    }
}
