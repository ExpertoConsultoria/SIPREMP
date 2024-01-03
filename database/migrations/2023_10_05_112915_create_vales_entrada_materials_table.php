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
        Schema::create('vales_entrada_materials', function (Blueprint $table) {
            $table->id();

            $table->text("folio");
            $table->text("fecha");
            $table->text("lugar");
            $table->text("asunto");
            $table->integer("id_receptor")->nullable();
            $table->text("entrego_material")->nullable();
            $table->text("token_recepcion")->nullable();
            $table->text("token_entrega")->nullable();
            $table->text("estatus_SG")->nullable();

            $table->text('mir_id_fin');
            $table->text('mir_id_proposito');
            $table->text('mir_id_componente');
            $table->text('mir_id_actividad');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vales_entrada_materials');
    }
};
