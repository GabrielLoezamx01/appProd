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
        Schema::table('sucursales', function (Blueprint $table) {
            $table->time('lunes_inicio')->nullable();
            $table->time('lunes_fin')->nullable();

            $table->time('martes_inicio')->nullable();
            $table->time('martes_fin')->nullable();

            $table->time('miercoles_inicio')->nullable();
            $table->time('miercoles_fin')->nullable();

            $table->time('jueves_inicio')->nullable();
            $table->time('jueves_fin')->nullable();

            $table->time('viernes_inicio')->nullable();
            $table->time('viernes_fin')->nullable();

            $table->time('sabado_inicio')->nullable();
            $table->time('sabado_fin')->nullable();

            $table->time('domingo_inicio')->nullable();
            $table->time('domingo_fin')->nullable();

            $table->string('img_portada')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('correo')->nullable();
            $table->text('acerca_de_nosotros')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sucursales', function (Blueprint $table) {
            $table->dropColumn([
                'image_portada',
                'lunes_inicio', 'lunes_fin',
                'martes_inicio', 'martes_fin',
                'miercoles_inicio', 'miercoles_fin',
                'jueves_inicio', 'jueves_fin',
                'viernes_inicio', 'viernes_fin',
                'sabado_inicio', 'sabado_fin',
                'domingo_inicio', 'domingo_fin',
                'img_portada', 'facebook', 'tiktok', 'instagram',
                'twitter', 'whatsapp', 'correo', 'acerca_de_nosotros',
            ]);
        });
    }
};
