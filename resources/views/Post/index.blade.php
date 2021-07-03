<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="css/post.css" rel="stylesheet" type="text/css">
    </head>

   <body>
 
        <h1>投稿一覧</h1>
        <p class='create'>[<a href='/posts/create'>create</a>]</p>
    　　<p class='book'>[<a href='/book'>検索</a>]</p>
    　　
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href='/posts/{{ $post->post_id }}'><h2 class='title'>{{ $post->title }}</h2></a>
                    <p class='body'>{{ $post->body }}</p>
                    <p class='tag'>{{ $post ->name }}</p>
                    <p class='date'>{{ $post->updated_at }}</p>
                   
                </div>
            @endforeach
        </div>
        
    </body>
</html>