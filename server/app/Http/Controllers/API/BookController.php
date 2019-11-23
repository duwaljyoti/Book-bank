<?php

namespace App\Http\Controllers\API;

use App\Http\Services\CommonService;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    private $commonService;
    private $book;

    public function __construct(CommonService $commonService, Book $book)
    {
        $this->commonService = $commonService;
        $this->book = $book;
    }

    public function create(Request $request)
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = str_random(5).$request->file('image')->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->stream();

            Storage::disk('local')->put($filename, $img);
        }

        $attributes = $request->all();
        $filename = str_random(5).$request->file('image')->getClientOriginalName();
        $attributes['image'] = $filename;

        return $this->commonService->save($this->book, $attributes);
    }

    public function bookListApi(): JsonResponse
    {
        $books = $this->book->all();
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

    public function otherBookList(int $user_id, int $book_id): JsonResponse
    {
        $select = ['id', 'name', 'author', 'image', 'is_for_rent'];

        $where  = [
            ['user_id','=', $user_id],
            ['id', '!=', $book_id],
            ['is_request', '=', 0]
        ];

        $with = ['category'];

        $books = $this->commonService->get($this->book, $where, $with, $select);
        $book_list['status'] = '1';
        $book_list['message'] = 'Success';
        $book_list['data'] [] = $books;

        return response()->json($book_list,200);

    }
}
