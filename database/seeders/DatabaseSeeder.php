<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make('aungminoo'),
            "image" => "image/user.png",
            "role" => "admin",
        ]);

        User::create([
            "name" => "Kyaw Gyi",
            "email" => "kyawgyi@gmail.com",
            "password" => Hash::make('aungminoo'),
            "image" => "image/user.png",
        ]);

        Category::create([
            "name" => "Shoe",
            "slug" => "shoe"
        ]);

        Category::create([
            "name" => "Pc",
            "slug" => "pc"
        ]);

        Category::create([
            "name" => "Phone",
            "slug" => "phone"
        ]);

        Product::factory(50)->create();
    }
}
