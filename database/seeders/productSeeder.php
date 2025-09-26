<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert(
            [
               [ "nameProd" => "MSI katana",
                "category_id" => 1,
                "Desc" => "contoh",
                "price" => 230000000,
                "stock" => 6],
               [ "nameProd" => "AC",
                "category_id" => 2,
                "Desc" => "contoh",
                "price" => 2300000,
                "stock" => 6]
                
            ]);
    }
}
