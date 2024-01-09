<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ApiKey;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => bcrypt('admin'),
        ]);

        $apiKey = ApiKey::create([
            'key' => 'abcd1234',
            'user_id' => $user->id
        ]);


        Product::create([
                'name' => 'Cheese Burger',
                'description' => 'Sajt burger',
                'category' => 'Burgerek',
                'price' => 750
            ]);
        Product::create([
            'name' => 'BFarm Burger',
            'description' => 'Mustáros marhaburger',
            'category' => 'Burgerek',
            'price' => 1280
        ]);

    }
}
