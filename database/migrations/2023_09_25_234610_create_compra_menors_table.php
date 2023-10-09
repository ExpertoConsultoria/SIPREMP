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

            $table->text('mir_id_fin');
            $table->text('mir_id_proposito');
            $table->text('mir_id_componente');
            $table->text('mir_id_actividad');

            $table->text('cm_subtotal');
            $table->text('cm_iva');
            $table->text('cm_total');

            $table->string('cm_creation_status');

            // $table->text('token_solicitud')->nullable();
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
