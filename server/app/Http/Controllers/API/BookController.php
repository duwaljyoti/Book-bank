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
    public function bookListApi(Request $request)
    {
        $searchQuery = $request->input('book_name');

        $booksQuery = Book::join('users', 'users.id', '=', 'books.user_id')
            ->join('categories', 'categories.id', '=', 'books.category_id')
            ->select('books.*','categories.name as category','users.name as user');

        if($searchQuery) {
            $booksQuery->where('books.name', 'like', '%' . $searchQuery . '%')
                ->orWhere('categories.name', 'like', '%' . $searchQuery . '%');
        }
        if($request->has('category')) {
            $categories = explode(',',$request->category);
            $booksQuery->orWhereIn('categories.id',$categories);
        }

        $books = $booksQuery->get();
        $book_list['status'] = '1';
        $book_list['message'] = 'Success';
        return response()->json(['status'=>'1','message'=>'Success','data'=>$books])->setStatusCode(200);
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
