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
        Schema::create('reportes_cm', function (Blueprint $table) {
            $table->id();

            $table->string('rcm_ejercicio');
            $table->date('rcm_inicio');
            $table->date('rcm_fin');
            $table->string('rcm_partida_presupuestal');
            
            $table->json('rcm_folios_cm');

            $table->text('rcm_area');
            $table->text('rcm_sucursal');
            $table->text('rcm_monto_gral');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporte_c_m_s');
    }
};
