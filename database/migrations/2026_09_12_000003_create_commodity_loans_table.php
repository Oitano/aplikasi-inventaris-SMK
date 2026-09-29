<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commodity_loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commodity_id')->constrained('commodities')->cascadeOnDelete();
            $table->date('loan_date');
            $table->date('return_date')->nullable();
            $table->unsignedBigInteger('quantity');
            $table->string('borrower');
            $table->string('status')->default('Dipinjam');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commodity_loans');
    }
};
