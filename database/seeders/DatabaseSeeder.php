<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\User;
use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Countries
        Country::factory()->count(3)->create()->each(function ($country) {
            // Create Users for each Country
            $users = User::factory()->count(2)->create(['country_id' => $country->id]);

            foreach ($users as $user) {
                // Create Posts and Videos
                $posts = Post::factory()->count(2)->create(['user_id' => $user->id]);
                $videos = Video::factory()->count(2)->create(['user_id' => $user->id]);

                // Comments for posts and videos
                foreach ($posts as $post) {
                    Comment::factory()->count(2)->create([
                        'user_id' => $user->id,
                        'commentable_id' => $post->id,
                        'commentable_type' => Post::class
                    ]);
                }

                foreach ($videos as $video) {
                    Comment::factory()->count(2)->create([
                        'user_id' => $user->id,
                        'commentable_id' => $video->id,
                        'commentable_type' => Video::class
                    ]);
                }
            }
        });

        // Create Tags
        $tags = Tag::factory()->count(5)->create();

        // Attach Tags to Posts and Videos
        Post::all()->each(function ($post) use ($tags) {
            $post->tags()->attach($tags->random(2));
        });

        Video::all()->each(function ($video) use ($tags) {
            $video->tags()->attach($tags->random(2));
        });
    }
}
