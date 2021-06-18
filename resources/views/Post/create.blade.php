<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        @push('css')
         <link href="{{ asset('css/post.css') }}" rel="stylesheet">
        @endpush
    
         
    </head>
    <body>
        <h1><a href="/">投稿内容</a></h1>
        <form action="/posts" method="POST">
            {{--POSTリクエストの時、csrfの値が必要＝サイバー攻撃を防ぐため--}}
            @csrf
            
             {{--画像投稿--}}
            <div class="title">
                <h2>画像選択</h2>
            </div>
            
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>キャプション</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            
            <div class="tag">
                <h2>タグ</h2>
                <input type="text" name="post[tag]" placeholder="タグ" value="{{ old('post.tag') }}"/>
                <p class="tag__error" style="color:red">{{ $errors->first('post.tag') }}</p>
            </div>

            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>