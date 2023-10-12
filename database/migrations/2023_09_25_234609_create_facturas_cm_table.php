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
        Schema::create('facturas_cm', function (Blueprint $table) {
            $table->id();
            $table->text('fcm_nombre');
            $table->text('fcm_extension');
            $table->string('fcm_xml_ruta');
            $table->string('fcm_pdf_ruta')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas_cm');
    }
};
