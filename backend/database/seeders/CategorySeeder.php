<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['title' => 'Category 1', 'slug' => 'category-one'],
            ['title' => 'Category 2', 'slug' => 'category-two'],
        ];
        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
