<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tw_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('username',45);
            $table->string('email', 45);
            $table->string('S_Nombre',45)->nullable();
            $table->string('S_Apellido',45)->nullable();
            $table->string('S_FotoPerfilUrl',255)->nullable();
            $table->boolean('S_Activo');
            $table->string('password',100);
            $table->string('verification_token',191)->nullable();
            $table->string('verifed',191);
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tw_usuarios');
    }
}
