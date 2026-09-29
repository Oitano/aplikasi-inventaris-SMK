<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('commodities', function (Blueprint $table) {
        if (!Schema::hasColumn('commodities', 'input_date')) {
            $table->date('input_date')->nullable();
        }

        if (!Schema::hasColumn('commodities', 'store_name')) {
            $table->string('store_name')->nullable();
        }

        if (!Schema::hasColumn('commodities', 'store_address')) {
            $table->text('store_address')->nullable();
        }

        if (!Schema::hasColumn('commodities', 'store_phone')) {
            $table->string('store_phone', 20)->nullable();
        }

        if (!Schema::hasColumn('commodities', 'receipt')) {
            $table->string('receipt')->nullable();
        }
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