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
            $table->text('cm_fecha');
            $table->text('cm_folio');

            $table->text('solicitante_id');
            $table->text('sucursal');
            $table->text('cm_asunto');

            $table->text('mir_id_fin');
            $table->text('mir_id_proposito');
            $table->text('mir_id_componente');
            $table->text('mir_id_actividad');

            $table->text('cm_subtotal');
            $table->text('cm_iva');
            $table->text('cm_total');

            $table->text('cm_creation_status');

            $table->text('token_solicitud')->nullable();
            $table->text('token_aceptacion')->nullable();


            $table->timestamps();
        });
        // Schema::create('compra_menors', function (Blueprint $table) {
        //     $table->id();

        //     // cm = Compra Menor
        //     $table->date('cm_fecha');
        //     $table->string('cm_folio')->unique();

        //     $table->unsignedBigInteger('solicitante_id');
        //     $table->foreign('solicitante_id')
        //         ->references('id')->on('users')
        //         ->onDelete('cascade');

        //     // $table->unsignedBigInteger('sucursal_id');
        //     // $table->foreign('sucursal_id')
        //     //     ->references('id')->on('org1_sedes')
        //     //     ->onDelete('cascade');

        //     $table->string('sucursal');
        //     $table->string('cm_asunto');

        //     $table->integer('mir_id_fin');
        //     $table->integer('mir_id_proposito');
        //     $table->integer('mir_id_componente');
        //     $table->integer('mir_id_actividad');

        //     $table->decimal('cm_subtotal', 10, 2);
        //     $table->decimal('cm_iva', 10, 2);
        //     $table->decimal('cm_total', 10, 2);

        //     $table->enum('cm_creation_status', [
        //         'Borrador',
        //         'Enviado',
        //     ]);

        //     $table->string('token_solicitud')->nullable();
        //     $table->string('token_aceptacion')->nullable();


        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_menors');
    }
};
