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
        Schema::create('proveedores_temporales', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->text('RFC', 13)->unique();
            $table->text('RazonSocial', 128);
            $table->text('Persona', 1)->default('M'); //(F)Fisica o (M)Moral
            $table->text('Nombre', 128)->nullable();
            $table->text('Telefono', 64)->nullable();
            $table->text('Regimen')->nullable();
            $table->text('Direccion', 128)->nullable();
            $table->text('CodigoPostal');
            $table->text('DatosContacto', 192)->nullable();
            $table->text('DatosBanco', 128)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores_temporales');
    }
};
