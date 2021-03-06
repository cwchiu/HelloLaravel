<?php
namespace App\Repository;

use App\BlogPost as BlogPostModel;
use App\BlogPostType as BlogPostTypeModel;

class BlogRepository {
    protected $post;
    protected $post_type;
    public function __construct(BlogPostModel $post, BlogPostTypeModel $post_type){
        $this->post = $post;
        $this->post_type = $post_type;
    }
    
    public function getAllPostByPages(int $page_size = 5){
        return BlogPostModel::orderBy('created_at', 'DESC')->paginate($page_size);
    }
    
    public function getAllPostType(){
        return BlogPostTypeModel::orderBy('name', 'ASC')->get();
    
    }
}
