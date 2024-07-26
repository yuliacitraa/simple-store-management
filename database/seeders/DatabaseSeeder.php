<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Products::create([
            'product_name' => 'terigu',
            'purchase_price' => '8000',
            'sale_price' => '10000',
            'stock' => '10',
        ]);

        Products::create([
            'product_name' => 'beras',
            'purchase_price' => '300000',
            'sale_price' => '400000',
            'stock' => '10',
        ]);

        Products::create([
            'product_name' => 'tapioka',
            'purchase_price' => '6000',
            'sale_price' => '7000',
            'stock' => '10',
        ]);
    }
}
