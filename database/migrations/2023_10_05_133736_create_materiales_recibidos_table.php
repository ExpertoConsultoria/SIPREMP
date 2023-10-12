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
        Schema::create('materiales_recibidos', function (Blueprint $table) {
            $table->id();

            $table->integer("cantidad");
            $table->text("unidad_medida");
            $table->text("concepto");
            $table->integer("precio_unitario");
            $table->text("importe");
            $table->text("info_extra")->nullable();

            $table->unsignedBigInteger('vales_entrada_materials_id')->unique();//folio_vale
            $table->unsignedBigInteger('partidas_presupuestales_id')->unique();//id_par_ppta

            $table->foreign('vales_entrada_materials_id')->references('id')->on('vales_entrada_materials')->onDelete('cascade');
            $table->foreign('partidas_presupuestales_id')->references('id')->on('partidas_presupuestales')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales_recibidos');
    }
};
