<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

     protected $faker;

    public function run(): void
    {
        //\App\Models\User::factory(10)->create();
        //\App\Models\Book::factory(20)->create();


        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            BookSeeder::class
        ]);
    }
}
