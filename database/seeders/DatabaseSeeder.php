<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call([
            UserSeeder::class,
            CommodityLocationSeeder::class,
            CommodityAcquisitionSeeder::class,
            CommoditySeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            UserRoleSeeder::class,
            RolePermissionSeeder::class,
        ]);
    }
}