<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');
            $table->foreignId('responsable_id')->constrained('users');
            $table->timestamp('fecha_caducidad')->nullable();
            $table->float('tiempo_utilizado')->default(0);
            $table->enum('estado', ['Abierto', 'Cerrado'])->default('Abierto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
