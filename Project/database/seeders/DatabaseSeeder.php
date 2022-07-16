<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->importCategories();
        $this->importProducts();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
    public function importCategories()
    {
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
        DB::table('categories')->insert([
            'name' => Str::random(10),
        ]);
    }
    public function importProducts()
    {
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => mt_rand(1000000, 9999999),
            'amouth' =>mt_rand(10, 100),
            'use' => Str::random(30),
            'image' => 'C/Saluy/'.Str::random(20),
            'status' => Str::random(30),
            'description' => Str::random(30),
            'category_id' => mt_rand(1, 12),
        ]);
      
      
    }
}
