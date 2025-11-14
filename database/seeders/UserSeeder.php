<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'), // password terenkripsi
        ]);
    }
}




// class UserSeeder extends Seeder
// {
//     /**
//      * Method run()
//      * Akan dijalankan ketika seeder dieksekusi.
//      */
//     public function run(): void
//     {
//         // Insert data user ke dalam tabel users
//         DB::table('users')->insert([
//             [
//                 // Username untuk login admin
//                 'username' => 'admin',
//                 // Email admin
//                 'email' => 'admin@gmail.com',
//                 // Password dienkripsi agar aman (tidak disimpan sebagai teks biasa)
//                 'password' => Hash::make('password123'),
//             ],

//             [
//                 // User kedua (misalnya staff)
//                 'username' => 'staff',
//                 'email' => 'staff@gmail.com',
//                 'password' => Hash::make('staff123'),
//             ],

//             [
//                 // User ketiga
//                 'username' => 'owner',
//                 'email' => 'owner@gmail.com',
//                 'password' => Hash::make('owner123'),
//             ],
//         ]);
//     }
// }
