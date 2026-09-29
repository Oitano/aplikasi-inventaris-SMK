<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('commodity_ins', function (Blueprint $table) {
            if (!Schema::hasColumn('commodity_ins','user_id')) $table->foreignId('user_id')->nullable()->after('commodity_id')->constrained('users')->nullOnDelete();
            if (!Schema::hasColumn('commodity_ins','store_name')) $table->string('store_name')->nullable()->after('source');
            if (!Schema::hasColumn('commodity_ins','store_phone')) $table->string('store_phone',20)->nullable()->after('store_name');
            if (!Schema::hasColumn('commodity_ins','price')) $table->unsignedBigInteger('price')->nullable()->after('store_phone');
            if (!Schema::hasColumn('commodity_ins','receipt')) $table->string('receipt')->nullable()->after('price');
        });
        Schema::table('commodity_outs', function (Blueprint $table) {
            if (!Schema::hasColumn('commodity_outs','user_id')) $table->foreignId('user_id')->nullable()->after('commodity_id')->constrained('users')->nullOnDelete();
            if (!Schema::hasColumn('commodity_outs','responsible_person')) $table->string('responsible_person')->nullable()->after('destination');
            if (!Schema::hasColumn('commodity_outs','commodity_location_id')) $table->foreignId('commodity_location_id')->nullable()->after('responsible_person')->constrained('commodity_locations')->nullOnDelete();
        });
    }
    public function down(): void {
        Schema::table('commodity_outs', function (Blueprint $table) {
            foreach (['commodity_location_id','user_id'] as $col) if (Schema::hasColumn('commodity_outs',$col)) $table->dropColumn($col);
            if (Schema::hasColumn('commodity_outs','responsible_person')) $table->dropColumn('responsible_person');
        });
        Schema::table('commodity_ins', function (Blueprint $table) {
            foreach (['receipt','price','store_phone','store_name','user_id'] as $col) if (Schema::hasColumn('commodity_ins',$col)) $table->dropColumn($col);
        });
    }
};