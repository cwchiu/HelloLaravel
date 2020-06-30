<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Blog\BlogPost as BlogPostModel;
use App\Models\Blog\BlogPostType as BlogPostTypeModel;
use App\Models\Blog\BlogComment as BlogCommentModel;
use App\Repository\Blog\BlogRepository;

use Auth;

class BlogPostController extends Controller
{
    protected $repository;
    public function __construct(BlogRepository $repository){
        $this->repository = $repository;
        $this->middleware('auth', ['except' => [
                'index', 'show'
            ]
        ]); 
    }
    
    public function index(){        
        return view('blog.post.index', [
            'posts' => $this->repository->getAllPostByPages(5),
            'post_types' => $this->repository->getAllPostType()
        ]);
    }
    
    public function create(){
        return view('blog.post.create', [
            'post_types' => $this->repository->getAllPostType()
        ]);
    }
    
    public function store(Request $req){
        $post = new BlogPostModel($req->all());
        $post->user_id = Auth::user()->id;
        $post->save();
        
        return redirect()->route('post.index');
    }
    
    
    public function show($id){
        $post = BlogPostModel::findOrFail($id);
        $comments = BlogCommentModel::where('post_id', $post->id)->orderBy('created_at', 'DESC')->paginate(5);
        return view('blog.post.show', [
            'post'=>$post,
            'comments' => $comments
        ]);
    }
    
    public function edit($id){
        $post = BlogPostModel::findOrFail($id);
        return view('blog.post.edit', [
            'post' => $post,
            'post_types' => $this->repository->getAllPostType()
        ]);
    }
    
    public function update(Request $req, $id){
        $post = BlogPostModel::findOrFail($id);
        $post->fill($req->all());
        $post->save();
        
        return redirect()->route('post.index');
    }
    
    public function destroy($id){
        $post = BlogPostModel::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index');
    }
    
}
