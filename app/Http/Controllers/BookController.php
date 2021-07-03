<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Post;
 
class BookController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
 
        $query = Post::query();
 
        if (!empty($keyword)) {
            $query->where('id', 'LIKE', "%{$keyword}%")
                ->orWhere('title', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%");
        }
 
        $posts = $query->get();
 
        return view('hello.index', compact('posts', 'keyword'));
    }
}