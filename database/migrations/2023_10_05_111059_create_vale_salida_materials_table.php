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
        Schema::create('vale_salida_materials', function (Blueprint $table) {
            $table->id();

            $table->text("folio");
            $table->text("fecha");
            $table->text("lugar");
            $table->integer("encargado_entrega");
            $table->integer("solicitante");
            $table->integer("mat_entregado");
            $table->text("token_solicitante");
            $table->text("token_entrega");
            $table->text("estatus_SG");
            // $table->text("info_extra")-> nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vale_salida_materials');
    }
};
