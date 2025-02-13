<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Man Man',
            'email' => 'pongsathon.janyoi@gmail.com',
            'password' => Hash::make('wordpass'),
        ]);
        $this->call([
            ProductTypesTableSeeder::class,
            ProductsTableSeeder::class,
        ]);
    }
}
