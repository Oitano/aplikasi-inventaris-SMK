<?php
namespace Database\Seeders;
use App\User;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder {
    public function run(): void {
        User::firstOrCreate(['email'=>'admin@mail.com'],['name'=>'Administrator','password'=>bcrypt('secret'),'status'=>'Aktif']);
        User::firstOrCreate(['email'=>'stafftu@mail.com'],['name'=>'Staff TU (Tata Usaha)','password'=>bcrypt('secret'),'status'=>'Aktif']);
        User::firstOrCreate(['email'=>'siswa@mail.com'],['name'=>'Siswa Demo','password'=>bcrypt('secret'),'status'=>'Aktif']);
    }
}