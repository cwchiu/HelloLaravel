<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use App\Http\Requests;
use App\BlogPost as BlogPostModel;
use App\BlogPostType as BlogPostTypeModel;
// use Illuminate\Foundation\Auth\ThrottlesLogins;
// use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use Log;
class BlogController extends BaseController
{
    // use AuthenticatesUsers, ThrottlesLogins;
    
    // protected $redirectTo = '/xxx';

    // protected $redirectAfterLogout = '/blog';
    
    public function __construct()
    {
        // $this->middleware('guest', ['except' => 'logout']);
        // $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
    
    public function index(){
        Log::alert('blog index');
        Log::debug('blog index');
        return redirect()->route('post.index');
    }
    
    public function showLoginForm(){
        return view('blog.login');
    }
    
    public function search(Request $req){
        // return view('blog.login');
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
    
    // public function login(Request $req){
        // $auth_data = $req->only(['email', 'password']);
        // if(Auth::attempt($auth_data, false)){
            // return redirect()->route('post.index');
        // }else{
        // }
        // $ref = new \ReflectionClass('Auth');
        // $ref = new \ReflectionMethod('Auth', 'attempt');
        // var_dump($auth_data, /*$ref->getFilename(),*/ Auth::attempt($auth_data, false), Auth::user()->id);
        
        // die('TODO');
    // }
    
    // public function logout(){
        // Auth::logout();
        // return redirect()->route('post.index');
    // }
}
