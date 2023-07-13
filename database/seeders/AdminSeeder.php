<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creating user
        User::create(['id' => 1,
        'full_name' => 'Administrator Admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('admin')])->assignRole('admin');
    }
}
