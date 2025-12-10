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
        Schema::create('love_letters', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Contoh: "Untuk saat kamu merasa sendirian"
            $table->text('content'); // Isi suratnya
            $table->string('sender')->default('Jul'); // Pengirim
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('love_letters');
    }
};
