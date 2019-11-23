<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\RequestBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function massRequests()
    {
        $books = RequestBook::join('books_requests','request_books.id','=','books_requests.request_id')
                ->join('books','books_requests.book_id','=','books.id')
                ->join('users','request_books.requested_by','=','users.id')
                ->where('is_mass',1)
                ->select('request_books.*','books.name as book_name','users.name as user_name')->get();

        return view('requests.list_mass_requests')->with('books',$books);
    }

    public function personalRequests()
    {
        $books = RequestBook::join('books_requests','request_books.id','=','books_requests.request_id')
            ->join('books','books_requests.book_id','=','books.id')
            ->join('users','request_books.requested_by','=','users.id')
            ->where('is_mass',0)
            ->select('request_books.*','books.name as book_name','users.name as user_name')->get();

        return view('requests.list_personal_requests')->with('books',$books);
    }
}
