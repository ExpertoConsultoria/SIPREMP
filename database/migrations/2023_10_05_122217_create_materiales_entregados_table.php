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
        Schema::create('materiales_entregados', function (Blueprint $table) {
            $table->id();

            $table->text("folio_vale_salida");
            $table->text("cantidad");
            $table->text("unidad_medida");
            $table->text("concepto");
            $table->text('partida_presupuestal_id');
            $table->text("precio_unitario");

            
            // $table->foreign('folio_vale')->references('folio')->on('vale_salida_materiales')->onDelete('cascade');
            // $table->foreign('partidas_presupuestales_id')->references('id')->on('partidas_presupuestales')->onDelete('cascade');//id_par_ppta

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales_entregados');
    }
};
