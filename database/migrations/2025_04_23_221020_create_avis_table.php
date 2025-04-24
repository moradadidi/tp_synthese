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
        if (!Schema::hasTable('avis')) {
            Schema::create('avis', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('ide');
                $table->foreign('ide')->references('codeE')->on('etudiants')->onDelete('cascade');
                $table->unsignedBigInteger('idf');
                $table->foreign('idf')->references('idf')->on('formations')->onDelete('cascade');
                $table->integer('points');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
