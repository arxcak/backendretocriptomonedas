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
        Schema::create('criptomonedas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('criptomoneda_nombre', 255)->unique();
            $table->string('criptomoneda_simbolo', 10)->unique();
            $table->unsignedBigInteger('moneda_id');
            $table->timestamps();

            $table->foreign('moneda_id')->references('id')->on('monedas')->onDelete('cascade');
     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criptomonedas');
    }
};
