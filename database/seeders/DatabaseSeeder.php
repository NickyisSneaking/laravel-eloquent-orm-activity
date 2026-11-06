<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //should i add this line for the product factory? yes you should add it
        //this underneath of this code at 21 should be added to the run method of the DatabaseSeeder class
        //this code remain  untoched and should be added to the run method of the DatabaseSeeder class
        // User::factory(10)->create();

        //a premade user for testing purposes
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        //add line for the product actitvity
        $categories = Category::factory(5)->create(); //create 5 categories using the factory
        Product::factory(2000)->recycle($categories)->create(); //create 20 products using the factory
        Order::factory(10)->create();//create 10 Order using the factory

    }
}
