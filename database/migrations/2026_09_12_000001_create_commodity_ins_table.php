<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commodity_ins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commodity_id')->constrained('commodities')->cascadeOnDelete();
            $table->date('date');
            $table->unsignedBigInteger('quantity');
            $table->string('source')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commodity_ins');
    }
};
