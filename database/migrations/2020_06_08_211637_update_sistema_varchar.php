<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSistemaVarchar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sistemas', function (Blueprint $table) {
            $table->string('sistema', 30)->change();
            $table->string('link', 30)->change();
            $table->string('nivel', 30)->change();
            $table->string('ativo', 30)->change();
            $table->string('link_imagem', 30)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sistemas', function (Blueprint $table) {
            //
        });
    }
}
