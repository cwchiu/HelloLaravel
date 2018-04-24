<?php

use Illuminate\Database\Seeder;
use App\User as UserModel;
use App\BlogPost as BlogPostModel;
use App\BlogPostType as BlogPostTypeModel;

class BlogSeeder extends Seeder
{
    public function run()
    {
        BlogPostModel::truncate();
        BlogPostTypeModel::truncate();
        
        $blog_post_types = factory(BlogPostTypeModel::class, 10)->create();
        factory(BlogPostModel::class, 50)->create()->each( function($post) use($blog_post_types) {
            $post->type = $blog_post_types[mt_rand(0, count($blog_post_types)-1)]->id;
            $post->save();
        });
        
    }
    
    
}
