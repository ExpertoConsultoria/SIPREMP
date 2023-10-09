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
        Schema::create('memorandum_lists', function (Blueprint $table) {
            $table->id();

            // im = Item de Memorandum
            $table->text('im_folio');
            $table->text('im_cantidad');
            $table->text('im_unidad_medida');
            $table->text('im_concepto');
            $table->string('im_partida_presupuestal');
            $table->text('im_precio_u');
            $table->text('im_importe');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memorandum_lists');
    }
};
