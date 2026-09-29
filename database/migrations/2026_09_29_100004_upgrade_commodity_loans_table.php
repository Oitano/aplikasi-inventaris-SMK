<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('commodity_loans', function (Blueprint $table) {
            if (!Schema::hasColumn('commodity_loans','user_id')) $table->foreignId('user_id')->nullable()->after('commodity_id')->constrained('users')->nullOnDelete();
            if (!Schema::hasColumn('commodity_loans','due_date')) $table->date('due_date')->nullable()->after('loan_date');
            if (!Schema::hasColumn('commodity_loans','purpose')) $table->text('purpose')->nullable()->after('borrower');
            if (!Schema::hasColumn('commodity_loans','borrowed_condition')) $table->string('borrowed_condition',50)->nullable()->after('purpose');
            if (!Schema::hasColumn('commodity_loans','returned_condition')) $table->string('returned_condition',50)->nullable()->after('borrowed_condition');
            if (!Schema::hasColumn('commodity_loans','approved_by')) $table->foreignId('approved_by')->nullable()->after('returned_condition')->constrained('users')->nullOnDelete();
            if (!Schema::hasColumn('commodity_loans','approved_at')) $table->timestamp('approved_at')->nullable()->after('approved_by');
            if (!Schema::hasColumn('commodity_loans','rejection_reason')) $table->text('rejection_reason')->nullable()->after('approved_at');
        });
    }
    public function down(): void {
        Schema::table('commodity_loans', function (Blueprint $table) {
            foreach (['rejection_reason','approved_at','approved_by','returned_condition','borrowed_condition','purpose','due_date','user_id'] as $col) {
                if (Schema::hasColumn('commodity_loans',$col)) $table->dropColumn($col);
            }
        });
    }
};