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
        Schema::create('materiales_entregados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('folio_vale');
            // $table->foreign('folio_vale') -> references('id') -> on('vale_salida_materiales') -> nullable()->nullOnDelete();
            $table->integer('cantidad');
            $table->string('unidad_medida');
            $table->string('concepto');
            // ID O CODIGO DE LA PARTIDA PRESUPUESTAL
            $table->unsignedBigInteger('id_par_pres');
            // $table->foreign('id_par_pres') -> references('id') -> on ('users') -> nullable()->constrained()->nullOnDelete();
            $table->float('precio_unitario');
            $table->string('info_extra') -> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales_entregados');
    }
};
