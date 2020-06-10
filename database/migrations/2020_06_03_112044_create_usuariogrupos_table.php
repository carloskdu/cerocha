<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuariogrupos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('grupo_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('grupo_id')->references('id')->on('grupoacessos');
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
        Schema::dropIfExists('usuariogrupos');
    }
}
