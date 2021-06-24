<h1>検索</h1>
 
<form action="{{url('/book')}}" method="GET">
    <p><input type="text" name="keyword" value="{{$keyword}}"></p>
    <p><input type="submit" value="検索"></p>
</form>
 
@if($books->count())
 
<table border="1">
    <tr>
        <th>title</th>
        <th>author</th>

    </tr>
    @foreach ($books as $book)
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title}}</td>
    </tr>
    @endforeach
</table>
 
@else
<p>見つかりませんでした。</p>
@endif