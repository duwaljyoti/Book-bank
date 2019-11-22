<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookListController extends Controller
{
    public function __construct()
    {

    }

    public function bookListApi()
    {
        $books = Book::all();
        $book_list['status'] = '1';
        $book_list['message'] = 'Success';
        foreach($books as $key=>$book){
            $book_list['data'] [] = [
            "user_id" =>$book->user_id,
            "name" =>$book->name,
            "author" =>$book->author,
            "publication" => $book->publication,
  ];
        }

        return response()->json($book_list)->setStatusCode(200);
    }
}
