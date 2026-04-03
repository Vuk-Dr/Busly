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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departure_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->smallInteger('seat_number');
            $table->decimal('price', 8, 2);
            $table->date('date');
            $table->string('start_city');
            $table->string('end_city');
            $table->timestamps();
            $table->index(['departure_id', 'date']);
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
