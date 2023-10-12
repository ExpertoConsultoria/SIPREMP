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
            $table->integer('icm_cantidad');
            $table->text('icm_unidad_medida');
            $table->text('icm_concepto');
            $table->float('icm_precio_u');
            $table->float('icm_importe');
            $table->text('info_extra')->nullable();

            $table->unsignedBigInteger('compra_menor_id')->unique();//icm_folio
            $table->unsignedBigInteger('partidas_presupuestales_id')->unique();//icm_par_ppta

            $table->foreign('compra_menor_id')->references('id')->on('compra_menor')->onDelete('cascade');
            $table->foreign('partidas_presupuestales_id')->references('id')->on('partidas_presupuestales')->onDelete('cascade');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_menor_lists');
    }
};
