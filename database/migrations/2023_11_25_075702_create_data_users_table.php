<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Columna de clave externa
            $table->string('codigopostal');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono');
            $table->string('fotodeperfil')->nullable();
            $table->string('estado');
            $table->string('ciudad');
            $table->string('direccion');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_users');
    }
};
