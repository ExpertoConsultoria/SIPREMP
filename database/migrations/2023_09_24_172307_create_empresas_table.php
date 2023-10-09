<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('RFC', 13)->unique();
            $table->string('RazonSocial', 128);
            $table->char('Persona', 1)->default('M'); //(F)Fisica o (M)Moral
            $table->string('Nombre', 128)->nullable();
            $table->string('Telefono', 64)->nullable();
            $table->integer('Regimen')->nullable();
            $table->string('Direccion', 128)->nullable();
            $table->integer('CodigoPostal');
            $table->string('DatosContacto', 192)->nullable();
            $table->string('DatosBanco', 128)->nullable();

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};
