<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sesione_id')->nullable();
            $table->foreign('sesione_id')->references('id')->on('sesiones');
            $table->unsignedInteger('tipo_file')->default(1);
            $table->unsignedInteger('orden')->nullable()->default(0);
            $table->string("titulo")->nullable();
            $table->text("descripcion")->nullable();
            $table->string("url")->nullable();
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
        Schema::dropIfExists('files');
    }
}
