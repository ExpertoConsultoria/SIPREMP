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

            $table->text("cantidad");
            $table->text("unidad_medida");
            $table->text("concepto");
            $table->text("precio_unitario");
            $table->text("importe");
            $table->text("folio_vale_entrada");
            $table->text('partidas_presupuestales_id');
            // $table->unsignedBigInteger('partidas_presupuestales_id')->unique();//id_par_ppta
            // $table->foreign('partidas_presupuestales_id')->references('id')->on('ppto_de_egresos')->onDelete('cascade');
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
