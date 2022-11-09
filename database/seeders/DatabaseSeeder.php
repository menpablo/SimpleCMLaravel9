<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\VideoPost;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $blogs = BlogPost::factory(10)->create();
        foreach ($blogs as $blog) {
            $comments = Comment::factory(2)->create();
            $blog->comments()->saveMany($comments);
        }
        VideoPost::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
