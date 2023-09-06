<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Post one',
                'slug' => 'post-one',
                'description' => "Desc",
                'category_id' => 1,
                'status' => 1

            ],
            [
                'title' => 'Post two',
                'slug' => 'post-two',
                'description' => "Desc",
                'category_id' => 1,
                'status' => 1
            ],
        ];
        foreach ($items as $category) {
            DB::table('posts')->insert($category);
        }
    }
}
