<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog_posts';
    protected $fillable = [
        'title',
        'type',
        'content'
    ];
    
    public $timestamps = true;
    public function anthor(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function postType(){
        return $this->hasOne(BlogPostType::class, 'id', 'type');
    }
    
	public function comments(){
		return $this->hasMany(BlogComment::class,'post_id','id');
	}
}
