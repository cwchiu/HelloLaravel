<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use App\Http\Requests;
use App\Models\Blog\BlogPost as BlogPostModel;
use App\Models\Blog\BlogPostType as BlogPostTypeModel;

use Auth;
use Log;
class BlogController extends BaseController
{
   
    public function index(){
        Log::alert('blog index');
        Log::debug('blog index');
        return redirect()->route('post.index');
    }
    
    public function showLoginForm(){
        return view('blog.login');
    }
    
    /**
     * 搜尋文章
     */
    public function search(Request $req){
        $keyword = trim($req->input('keyword'));
        if(strlen($keyword)==0){
            return redirect()->route('post.index');
        }
        $posts = BlogPostModel::where('title', 'like', "%{$keyword}%")->orderBy('created_at', 'DESC')->paginate(5);
        $post_types = BlogPostTypeModel::orderBy('name', 'ASC')->get();
        return view('blog.post.index', [
            'posts' => $posts,
            'post_types' => $post_types,
            'keyword' => $keyword
        ]);
    }
    
    
}
