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
        Schema::create('ppto3_part_genericas', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('PartidaGenerica');
            $table->string('PartidaGenericaNombre', 150);
            $table->timestamps();

            $table->foreignId('ppto2_concepto_id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppto3_part_genericas');
    }
};
