<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('commodities', function (Blueprint $table) {
            $table->string('inventory_number', 100)
                ->nullable()
                ->unique()
                ->after('item_code');
        });
    }

    public function down(): void
    {
        Schema::table('commodities', function (Blueprint $table) {
            $table->dropUnique(['inventory_number']);
            $table->dropColumn('inventory_number');
        });
    }
};