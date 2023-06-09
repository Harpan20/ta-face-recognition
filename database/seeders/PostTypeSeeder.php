<?php

namespace Database\Seeders;

use App\Models\PostType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post_types = [
            [
                'name' => 'article',
                'slug' => 'article-' . uniqid(),
            ],
            [
                'name' => 'news',
                'slug' => 'news-' . uniqid(),
            ]
        ];

        foreach ($post_types as $post_type) {
            PostType::query()->updateOrCreate([
                'name' => $post_type['name'],
                'slug' => $post_type['slug'],
            ]);
        }
    }
}
