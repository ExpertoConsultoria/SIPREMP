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
        Schema::create('ppto2_conceptos', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('Concepto');
            $table->string('ConceptoNombre', 100);
            $table->timestamps();

            $table->foreignId('ppto1_capitulo_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppto2_conceptos');
    }
};
