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
        Schema::create('compra_menor_lists', function (Blueprint $table) {
            $table->id();

            // icm = Item de Compra Menor
            $table->text('icm_folio');
            $table->text('icm_cantidad');
            $table->text('icm_unidad_medida');
            $table->text('icm_concepto');
            $table->text('icm_partida_presupuestal');
            $table->text('icm_precio_u');
            $table->text('icm_importe');

            $table->timestamps();
        });
        // Schema::create('compra_menor_lists', function (Blueprint $table) {
        //     $table->id();

        //     // icm = Item de Compra Menor
        //     $table->string('icm_folio');
        //     $table->decimal('icm_cantidad', 10, 2);
        //     $table->string('icm_unidad_medida');
        //     $table->string('icm_concepto');
        //     $table->string('icm_partida_presupuestal');
        //     $table->decimal('icm_precio_u', 10, 2);
        //     $table->decimal('icm_importe', 10, 2);

        //     $table->foreign('icm_folio')->references('cm_folio')->on('compra_menors')
        //         ->onUpdate('cascade')->onDelete('cascade');

        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_menor_lists');
    }
};
