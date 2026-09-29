<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('sanctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('commodity_loan_id')->nullable()->constrained('commodity_loans')->nullOnDelete();
            $table->foreignId('commodity_id')->nullable()->constrained('commodities')->nullOnDelete();
            $table->string('violation_type');
            $table->text('description');
            $table->date('date');
            $table->string('status')->default('Belum diselesaikan');
            $table->text('admin_note')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('sanctions'); }
};