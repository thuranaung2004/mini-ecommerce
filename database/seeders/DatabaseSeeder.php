<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Product::create([
            "name"=>"watch 12",
            "price"=> 250000 ,
            "description"=>"something about watch",
            "stock"=>1


        ]);
         Product::create([
            "name"=>"watch 10 ",
            "price"=> 155000 ,
            "description"=>"something about watch",
            "stock"=>0


        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            "role"=>"admin",
        ]);
        
    }
}
