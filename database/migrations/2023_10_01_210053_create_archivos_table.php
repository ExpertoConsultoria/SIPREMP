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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();

            $table->text("fecha_registro");
            $table->text("lugar_registro");
            $table->text("folio");
            // $table->integer("NoFin");
            // $table->integer("NoProposito");
            // $table->integer("NoComponente");
            // $table->integer("NoActividad");
            $table->text("arch_nombre");
            $table->text("arch_descripcion");
            $table->text("arch_extension");
            $table->string('arch_ruta');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
