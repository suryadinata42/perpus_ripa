<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'username' => 'admin', // field tambahan baru
                'email' => 'admin@example.com',
                'password' => Hash::make('123456'), // pastikan untuk meng-hash password
                'level' => 'admin', // field tambahan baru
            ],
            [
                'username'=>'user1',
                'name'=>'Akun User1',
                'email'=>'user1@gmail.com',
                'level'=>'petugas',
                'password'=>Hash::make('123456')
            ],
            [
                'username'=>'anggota1',
                'name'=>'Akun Anggota1',
                'email'=>'anggota1@gmail.com',
                'level'=>'anggota',
                'password'=>Hash::make('123456')
            ],
        ];
    
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
