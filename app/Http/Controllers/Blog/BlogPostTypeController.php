<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\BlogPost as PostModel;
use App\BlogPostType as PostTypeModel;

use App\Repository\BlogRepository;

class BlogPostTypeController extends Controller
{
    protected $repository;
    public function __construct(BlogRepository $repository){
        $this->repository = $repository;
        $this->middleware('auth', ['except' => [
                'show'
            ]
        ]); 
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.posttype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PostTypeModel::create($request->only('name'));
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type_id)
    {
        $type = PostTypeModel::findOrFail($type_id);
        $posts = PostModel::where('type',$type_id)->orderBy('created_at','DESC')->paginate(5);
        // $post_types = PostTypeModel::orderBy('name','ASC')->get();
        return view('blog.post.index',[
            'posts'=>$posts,
            'post_types'=> $this->repository->getAllPostType(),
            'type'=>$type
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post_type = PostTypeModel::findOrFail($id);
        return view('blog.posttype.edit',['post_type'=>$post_type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PostTypeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post_type = PostTypeModel::findOrFail($id);
        $post_type->fill($request->only('name'));
        $post_type->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_type = PostTypeModel::findOrFail($id);
        if($post_type){
            $post_type->posts()->delete();
            $post_type->delete();
        }
        return redirect()->route('post.index');
    }
}
