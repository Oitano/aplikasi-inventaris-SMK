<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('commodities', function (Blueprint $table) {
            $table->date('input_date')->nullable()->after('id');
            $table->string('store_name')->nullable()->after('input_date');
            $table->text('store_address')->nullable()->after('store_name');
            $table->string('store_phone', 20)->nullable()->after('store_address');
            $table->string('receipt')->nullable()->after('store_phone');
        });
    }

    public function down(): void
    {
        Schema::table('commodities', function (Blueprint $table) {
            $table->dropColumn([
                'input_date',
                'store_name',
                'store_address',
                'store_phone',
                'receipt',
            ]);
        });
    }
};