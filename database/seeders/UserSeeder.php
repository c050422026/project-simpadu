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
        User::factory(250)->create();

        User::create([
            'name' => 'Fajar Ramdani',
            'email' => 'c050422026@mahasiswa.poliban.ac.id',
            'email_verified_at' => now(),
            'password' => Hash::make('vokasi@123'),
            'roles' => 'mahasiswa',
        ]);
    }
}
