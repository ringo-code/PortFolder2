<h1>検索</h1>
 
<form action="{{url('/book')}}" method="GET">
    <p><input type="text" name="keyword" value="{{$keyword}}"></p>
    <p><input type="submit" value="検索"></p>
</form>
 
@if($posts->count())
 
<table border="3">

    @foreach ($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title}}</td>
        <td>{{ $post->body}}</td>
        
      @foreach ($tags as $tag)
        <td>{{ $tag->name }}</td>  
      @endforeach

    </tr>
    @endforeach
</table>
 
@else
<p>見つかりませんでした。</p>
@endif