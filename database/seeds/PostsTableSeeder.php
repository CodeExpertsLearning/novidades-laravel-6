<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Post::class, 30)->create()->each(function($post){
            $post->post_images()->save(
                factory(\App\PostImage::class)->make()
            );
        });
    }
}
