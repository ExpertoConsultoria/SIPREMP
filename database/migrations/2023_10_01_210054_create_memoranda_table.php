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
        Schema::create('memoranda', function (Blueprint $table) {
            $table->id();

            $table->date('memo_fecha');
            $table->string('memo_folio', 100)->unique();

            $table->unsignedBigInteger('solicitante_id');
            $table->foreign('solicitante_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('memo_sucursal');

            $table->string('destinatario');

            $table->string('memo_asunto');

            $table->text('mir_id_fin');
            $table->text('mir_id_proposito');
            $table->text('mir_id_componente');
            $table->text('mir_id_actividad');

            $table->text('memo_id_cotizacion');

            $table->enum('memo_creation_status', [
                'Enviado',
                'Borrador',
                'Rechazado',
                'Aprobado',
                'Validado',
            ]);

            $table->boolean('pending_review')->default(0); // Solo cambia si ha sido Aprovada o Rechazada
            $table->boolean('pass_filter')->default(0); // Solo cambia si ha sido Aprovada o Rechazada
            $table->text('motivo_rechazo')->nullable();

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
        Schema::dropIfExists('memoranda');
    }
};
