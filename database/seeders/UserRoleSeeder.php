<?php
namespace Database\Seeders;
use App\User;
use Illuminate\Database\Seeder;
class UserRoleSeeder extends Seeder {
    public function run(): void {
        $map=[
            'admin@mail.com'=>'Administrator',
            'stafftu@mail.com'=>'Staff TU (Tata Usaha)',
            'siswa@mail.com'=>'Siswa',
        ];
        foreach($map as $email=>$role){
            if($user=User::where('email',$email)->first()) $user->syncRoles([$role]);
        }
    }
}