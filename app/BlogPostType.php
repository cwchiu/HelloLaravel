<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPostType extends Model
{
    protected $table = 'blog_post_types';
    protected $fillable = [
        'name'
    ];
    
    public $timestamps = false;
    
    public function posts(){
        return $this->hasMany(BlogPost::class, 'type', 'id');
    }
}
