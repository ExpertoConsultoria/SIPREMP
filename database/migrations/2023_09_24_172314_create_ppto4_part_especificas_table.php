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
        Schema::create('ppto4_part_especificas', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('PartidaEspecifica');
            $table->string('PartidaEspecificaNombre', 180);
            $table->mediumText('PartidaEspecificaDescripcion');

            $table->timestamps();

            $table->foreignId('ppto3_part_generica_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppto4_part_especificas');
    }
};
