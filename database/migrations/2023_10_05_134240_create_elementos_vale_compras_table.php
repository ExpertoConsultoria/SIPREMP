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

            $table->integer("cantidad");
            $table->text("unidad_medida");
            $table->text("concepto");
            $table->float("precio_unitario");
            $table->float("importe");
            // $table->text("info_extra")->nullable();

            $table->unsignedBigInteger('vales_compra_id')->unique();//folio_compra
            $table->unsignedBigInteger('partidas_presupuestales_id')->unique();//id_par_ppta

            $table->foreign('vales_compra_id')->references('id')->on('vales_compra')->onDelete('cascade');
            // $table->foreign('partidas_presupuestales_id')->references('id')->on('partidas_presupuestales')->onDelete('cascade');

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
