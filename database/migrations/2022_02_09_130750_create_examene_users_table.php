<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExameneUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examene_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('examene_id')->nullable();
            $table->foreign('examene_id')->references('id')->on('examenes');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('entrego_tarde')->default(false);
            $table->float('nota')->nullable();
            $table->text('comentario')->nullable();
            $table->text('comentario_student')->nullable();
            $table->string('url')->nullable();
            $table->string('url_student')->nullable();
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
        Schema::dropIfExists('examene_users');
    }
}
