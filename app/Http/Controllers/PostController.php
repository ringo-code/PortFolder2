<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Article_tag;
use App\Tag;
use App\UploadImage;
use App\Http\Requests\PostRequest; // useする
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Post $post,Tag $tag)

    {
            $latest_posts = DB::table('article_tags')
            ->join('posts', 'posts.id', '=', 'article_tags.post_id')
            ->join('tags', 'tags.id', '=', 'article_tags.tag_id')
            // ->select('article_tags.*', 'tags.name', 'posts.title','posts.body')
            ->get();

        return view('Post/index')->with(['posts' => $latest_posts]);
    }

    public function show(Post $post,Tag $tag)
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
	    //自由タグ
	    $tag=new Tag;
	    $tag->fill($request['tag']);
	    $tag->save();
	    //記事タグ
	    $article_tag=new Article_tag;
	    $article_tag->post_id = $post->id;
	    $article_tag->tag_id = $tag->id;
	    $article_tag->save();
	    //画像
	    $upload_image=new UploadImage;
	    $upload_image->post_id = $post->id;
	    $upload_image->fill($request['uploadImage']);
	    $upload_image->save();
	    
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