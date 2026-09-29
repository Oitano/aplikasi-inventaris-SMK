<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void {
        Schema::table('commodities', function(Blueprint $table){
            if(!Schema::hasColumn('commodities','category')) $table->string('category')->nullable()->after('material');
            if(!Schema::hasColumn('commodities','unit')) $table->string('unit')->nullable()->after('quantity');
            if(!Schema::hasColumn('commodities','status')) $table->string('status')->default('Tersedia')->after('unit');
            if(!Schema::hasColumn('commodities','photo')) $table->string('photo')->nullable()->after('receipt');
        });
        if(Schema::hasColumn('commodities','register')){
            DB::statement("ALTER TABLE commodities MODIFY register VARCHAR(255) NULL");
        }
    }
    public function down(): void {
        Schema::table('commodities',function(Blueprint $table){
            foreach(['category','unit','status','photo'] as $col) if(Schema::hasColumn('commodities',$col)) $table->dropColumn($col);
        });
    }
};