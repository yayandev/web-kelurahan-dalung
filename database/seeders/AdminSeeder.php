<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'nama' => 'Administrator',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('dalung123'),
            'role' => 'admin',
            'no_hp' => '083873614764'
        ]);
    }
}
