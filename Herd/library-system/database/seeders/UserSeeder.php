<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Wajib untuk enkripsi password
use App\Models\User; // Wajib untuk memanggil model User

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun admin perpustakaan
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Perpustakaan',
                'password' => Hash::make('password123'), // Password harus di-hash (enkripsi)
            ]
        );
    }
}