<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSistemaVarchar2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sistemas', function (Blueprint $table) {
            $table->string('sistema', 100)->change();
            $table->string('link', 20)->change();
            $table->string('nivel', 30)->change();
            $table->string('ativo', 1)->change();
            $table->string('link_imagem', 50)->change();
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
