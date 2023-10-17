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

            $table->integer("cantidad");
            $table->text("unidad_medida");
            $table->text("concepto");
            $table->float("precio_unitario");
            $table->text("info_extra")->nullable();

            $table->unsignedBigInteger('vale_salida_materials_id')->unique();
            $table->unsignedBigInteger('partidas_presupuestales_id')->unique();

            $table->foreign('vale_salida_materials_id')->references('id')->on('vale_salida_materials')->onDelete('cascade');//folio_vale
            $table->foreign('partidas_presupuestales_id')->references('id')->on('partidas_presupuestales')->onDelete('cascade');//id_par_ppta

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
