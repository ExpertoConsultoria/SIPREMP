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
        Schema::create('compra_consolidadas', function (Blueprint $table) {
            $table->id();
            $table->text('fecha');
            $table->text('folio');
            $table->text('sucursal');
            $table->text('area') ;
            $table->text('justificacion');
            $table->text('asunto')->nullable();
            $table->text('objeto')->nullable();
            $table->text('alcance')->nullable();
            $table->text('procedimiento_entrega')->nullable();
            $table->text('entregables')->nullable();
            $table->text('muestras')->nullable();
            $table->text('recursos_humanos')->nullable();
            $table->text('soporte_tecnico')->nullable();
            $table->text('mantenimiento')->nullable();
            $table->text('capacitacion')->nullable();
            $table->text('vigencia')->nullable();
            $table->text('forma_pago')->nullable();
            $table->text('garantia')->nullable();
            // ATRIBUTOS MIR
            $table->text('mir_id_fin');
            $table->text('mir_id_proposito');
            $table->text('mir_id_componente');
            $table->text('mir_id_actividad');
            $table->text('mir_id_cotizacion');

            $table->text('id_proveedor')->nullable();
            $table->text('tipo_proveedor')->nullable();

            $table->text('estado');
            $table->text('token_aceptacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_consolidadas');
    }
};
