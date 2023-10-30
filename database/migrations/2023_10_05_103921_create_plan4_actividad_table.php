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
        Schema::create('plan4_actividad', function (Blueprint $table) {
            $table->id();

            $table->smallInteger("NoActiviadad");
            $table->text("DescActividad");
            $table->bigInteger("org2_area_id");
            $table->bigInteger("plan3_componente_id");
            $table->bigInteger("plan2_proposito_id");
            $table->bigInteger("plan1_fin_id");

            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan4_actividad');
    }
};
