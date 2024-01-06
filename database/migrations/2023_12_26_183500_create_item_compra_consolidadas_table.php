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
        Schema::create('item_compra_consolidadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compra_consolidada_id')->nullable();

            $table->text('cantidad');
            $table->text('concepto');
            $table->text('precio_unitario');
            $table->text('importe');
            $table->text('partida_presupuestal');
            $table->text('total');

            // $table->text('subtotal');
            // $table->text('iva');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_compra_consolidadas');
    }
};
