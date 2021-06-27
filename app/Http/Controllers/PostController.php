<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Http\Requests\PostRequest; // useする
use Illuminate\Support\Facades\DB;
use App\Article_tag;
use App\Tag;

class PostController extends Controller
{
    public function index(Post $post)

    {
        return view('Post/index')->with(['posts' => $post->getPaginate()]);
    }

    public function show(Post $post)
    {
        return view('Post/show')->with(['post' => $post]);
    }

    public function create()
    {
        return view('Post/create');
    }

    public function store(PostRequest $request, Post $post) // 引数をRequest->PostRequestにする
    {
        $input = $request['post'];
        $post->fill($input);
	    $post->user_id = Auth::id();
	    $post->save();
	    $tag=new Tag;
	    $tag->fill($request['tag']);
	    $tag->save();
	    $article_tag=new Article_tag;
	    $article_tag->post_id = $post->id;
	    $article_tag->tag_id = $tag->id;
	    $article_tag->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
    return view('Post/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    return redirect('/posts/' . $post->id);
    }
    
    public function destroy(Post $post)
    {
    $post->delete();
    return redirect('/');
    }

}

?>