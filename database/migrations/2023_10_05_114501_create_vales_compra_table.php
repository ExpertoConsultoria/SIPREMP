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
        Schema::create('vales_compra', function (Blueprint $table) {
            $table->id();

            $table->string("folio", 100);
            $table->text("fecha");

            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')
                ->references('id')->on('users')
                ->onDelete('cascade');


            $table->text("lugar");
            $table->text("NoFin")->nullable();
            $table->text("NoProposito")->nullable();
            $table->text("NoComponente")->nullable();
            $table->text("NoActividad")->nullable();
            $table->text("id_proveedor")->nullable();
            $table->text("justificacion");
            $table->text("lugar_entrega")->nullable();
            $table->text("fecha_entrega")->nullable();
            $table->text("subtotal")->nullable();
            $table->text("iva")->nullable();
            $table->text("total_compra")->nullable();

            $table->text("folio_solicitud")->nullable();

            $table->enum('creation_status', [
                'Enviado',
                'Borrador',
                'Rechazado',
                'Aprobado',
                'Validado',
            ]);
            $table->enum('tipo_proveedor', [
                'Fijo',
                'Temporal'
            ])->nullable();

            $table->boolean('pending_review')->default(0); // Solo cambia si ha sido Aprovada o Rechazada
            $table->boolean('pass_filter')->default(0); // Solo cambia si ha sido Aprovada o Rechazada
            $table->text('motivo_rechazo')->nullable();

            $table->text("token_solicitante")->nullable();
            $table->text("token_rev_val")->nullable();
            $table->text("token_disp_ppta")->nullable();
            $table->text("token_autorizacion")->nullable();

            $table->unsignedBigInteger('archivos_id')->unique()->nullable();//id_arch_cotizacion
            $table->foreign('archivos_id')->references('id')->on('archivos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vales_compra');
    }
};
