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
        Schema::create('compra_menors', function (Blueprint $table) {
            $table->id();

            // cm = Compra Menor
            $table->date('cm_fecha');
            $table->text('cm_folio')->unique();

            $table->unsignedBigInteger('solicitante_id');
            $table->foreign('solicitante_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('sucursal');

            $table->string('cm_asunto');

            $table->text('mir_id_fin')->nullable();
            $table->text('mir_id_proposito')->nullable();
            $table->text('mir_id_componente')->nullable();
            $table->text('mir_id_actividad')->nullable();

            $table->text('cm_subtotal');
            $table->text('cm_iva');
            $table->text('cm_total');

            $table->string('cm_creation_status');

            // XML
            // $table->foreignId('factura_cm_id')->nullable()->constrained()->restrictOnDelete();
            $table->unsignedBigInteger('factura_cm_id')->nullable();
            $table->foreign('factura_cm_id')
                ->references('id')->on('facturas_cm')
                ->onDelete('cascade');


            $table->foreignId('empresa_id')->nullable()->constrained()->restrictOnDelete();

            // Tokens
            $table->text('token_aceptacion')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_menors');
    }
};
