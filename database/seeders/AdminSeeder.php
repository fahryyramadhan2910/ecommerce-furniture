<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name'     => 'Administrator',
            'email'    => 'admin@furniture.com',
            'password' => 'password', // Auto-hashed by the Model's casts()
        ]);
    }
}
