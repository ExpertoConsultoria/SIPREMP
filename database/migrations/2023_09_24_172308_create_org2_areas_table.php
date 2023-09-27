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
        Schema::create('org2_areas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('AreaNombre', 128);
            $table->string('strNivel', 5)->nullable();
            $table->mediumInteger('SubAreas')->default(0); //No. de plazas directas
            $table->mediumInteger('SubAreasAsignadas')->nullable()->default(0); //No. de plazas asignadas
            $table->boolean('Activa')->nullable()->default(1);

            //Id MISMA tabla para indicar Area de adscripcion y construir la estructura;
            $table->foreignId('parent_id')->nullable()->constrained('org2_areas')->restrictOnDelete(); //restric on delete para evitar borrados accidentales de areas superiores
            $table->foreignId('org1_sede_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('org2_areas');
    }
};
