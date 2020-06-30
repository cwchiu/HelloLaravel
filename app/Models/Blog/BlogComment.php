<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use App\User;

class BlogComment extends Model
{
    protected $table = 'comments';

	protected $fillable = [
		'content'
	];

	public $timestamps = true;

	public function author(){
		return $this->belongsTo(User::class,'user_id','id');
	}

	public function post(){
		return $this->belongsTo(Post::class,'id','post_id');
	}

}
