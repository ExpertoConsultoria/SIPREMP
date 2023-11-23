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
        Schema::create('elementos__vale_compras', function (Blueprint $table) {
            $table->id();

            $table->text("cantidad");
            $table->text("unidad_medida");
            $table->text("concepto");
            $table->text("precio_unitario");
            $table->text("importe");
            $table->text("partida_presupuestal");

            $table->unsignedBigInteger('vales_compra_id');//folio_compra

            $table->foreign('vales_compra_id')->references('id')->on('vales_compra')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos__vale_compras');
    }
};
