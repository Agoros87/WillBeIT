<?php

namespace Database\Seeders;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;
class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::factory(20)->create();
        Comment::factory(20)->create();
    }
}
