<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Book;
 
class BookController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
 
        $query = Book::query();
 
        if (!empty($keyword)) {
            $query->where('id', 'LIKE', "%{$keyword}%")
                ->orWhere('title', 'LIKE', "%{$keyword}%");
        }
 
        $books = $query->get();
 
        return view('hello.index', compact('books', 'keyword'));
    }
}