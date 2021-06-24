<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="css/post.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    
   <body>
        <h1>投稿一覧</h1>

        <p class='create'>[<a href='/posts/create'>create</a>]</p>
    　　<p class='book'>[<a href='/book'>検索</a>]</p>
    　　
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href='/posts/{{ $post->id }}'><h2 class='title'>{{ $post->title }}</h2></a>

                    <p class='body'>{{ $post->body }}</p>
                    <p class='date'>{{ $post->updated_at }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>