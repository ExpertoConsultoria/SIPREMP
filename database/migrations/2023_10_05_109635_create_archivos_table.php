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

            $table->text("fecha");
            $table->text("lugar");
            $table->text("folio");
            $table->integer("NoFin");
            $table->integer("NoProposito");
            $table->integer("NoComponente");
            $table->integer("NoActividad");
            $table->text("titulo");
            $table->text("descripcion");
            $table->text("archivo_pdf");
            $table->text("info_extra")->nullable();

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
