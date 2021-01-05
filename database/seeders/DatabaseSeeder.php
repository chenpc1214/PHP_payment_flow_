<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Product;

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
        Product::updateOrCreate(['id'=> 1 , 'name' => '便宜', 'price' => 200]);
        Product::updateOrCreate(['id'=> 2 , 'name' => '爆幹貴', 'price' => 20000]);
        
    }
}
