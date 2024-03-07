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
        Schema::create('encuestas', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique();
            $table->enum('conoce', ['SI', 'NO']);
            $table->enum('informado', ['SI', 'NO']);
            $table->enum('decision', ['SI', 'NO', 'INDECISO']);
            // $table->string('imagen');
            $table->string('latitud')->unique();
            $table->string('longitud')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('brigada_id')->constrained()->onDelete('cascade');
            $table->foreignId('estado_id')->constrained()->onDelete('cascade');
            $table->foreignId('municipio_id')->constrained()->onDelete('cascade');
            $table->foreignId('distrito_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuestas');
    }
};
