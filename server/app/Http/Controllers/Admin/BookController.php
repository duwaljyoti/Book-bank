<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::join('users', 'users.id', '=', 'books.user_id')
                ->join('categories', 'categories.id', '=', 'books.category_id')
                ->select('books.*','categories.name as category','users.name as user')->get();

        return view('books.list')->with('books',$books);
    }
}
