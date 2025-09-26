<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $test = carbon::now();
        DB::table('categories')->insert([
            [
            "name" => "computer",
            "created_at" => $test,
            "updated_at" => $test],
            [
            "name" => "elektronik",
            "created_at" => $test,
            "updated_at" => $test,]
        ]);
    }
}
