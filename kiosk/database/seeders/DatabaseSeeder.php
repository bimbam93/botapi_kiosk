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
            'description' => 'Sajtos burger uborkával, ketchuppal',
            'category' => 'Burgerek - Kicsi',
            'price' => 750
        ]);
        Product::create([
            'name' => 'Spicy Burger',
            'description' => 'Marha burger pirított hagymával, pikáns szósszal',
            'category' => 'Burgerek - Kicsi',
            'price' => 800
        ]);
        Product::create([
            'name' => 'HamBurger',
            'description' => 'Ezt magyarázzam?',
            'category' => 'Burgerek - Kicsi',
            'price' => 700
        ]);


        Product::create([
            'name' => 'BFarm Burger',
            'description' => 'Marhaburker mustáros szósszal hagymával és salátával',
            'category' => 'Burgerek - Nagy',
            'price' => 1290
        ]);
        Product::create([
            'name' => 'BigBOT Burger',
            'description' => 'Ha nagy és a legjobb kell.!',
            'category' => 'Burgerek - Nagy',
            'price' => 1690
        ]);

    }
}
