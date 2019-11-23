<?php

namespace App\Http\Controllers\API;

use App\Http\Services\CommonService;
use App\Models\Book;
use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    private $commonService;
    private $book;
    private $rent;

    public function __construct(CommonService $commonService, Book $book, Rent $rent)
    {
        $this->commonService = $commonService;
        $this->book = $book;
        $this->rent = $rent;
    }
    public function bookListApi(Request $request)
    {
        $searchQuery = $request->input('book_name');

        $booksQuery = Book::join('users', 'users.id', '=', 'books.user_id')
            ->join('categories', 'categories.id', '=', 'books.category_id')
            ->where('is_request','=',0)
            ->select('books.*','categories.name as category','users.name as user');

        if($searchQuery) {
            $booksQuery->where('books.name', 'like', '%' . $searchQuery . '%')
                ->orWhere('categories.name', 'like', '%' . $searchQuery . '%');
        }
        if($request->has('category')) {
            $categories = explode(',',$request->category);
            $booksQuery->orWhereIn('categories.id',$categories);
        }
        if($request->has('price_range')){
            $price_range = explode(',',$request->price_range);
            $min_price = $price_range[0];
            $max_price = $price_range[1];
            $book = $booksQuery->orwhere('books.price','>=',$min_price)
                ->where('books.price','<=',$max_price);
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
        $attributes['image'] = $filename;

        $book = $this->commonService->save($this->book, $attributes);

        $response['status'] = 1;
        $response['message'] = 'Success';
        $response['data'] = $this->find($book['id']);

        return response()->json($response, 200);
    }

    public function find(int $id)
    {
        $with = ['category', 'user'];

        return $this->commonService->find($this->book, $id, $with);
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

    public function borrowCreate(Request $request)
    {
        $attributes = $request->all();
        $from_date = Carbon::now();
        $due_date = Carbon::now()->addDays(30)->toDateString();
        $attributes['book_id'] = $request->book_id;
        $attributes['rented_by'] = $request->rented_by;
        $attributes['from_date'] = $from_date->toDateString();
        $attributes['due_date'] =$due_date;

        $data['is_for_rent'] = 1;
        Book::whereId($request->book_id)->update($data);

        return $this->commonService->save($this->rent, $attributes);

    }

    public function acquired ($id)
    {
        $data['is_acquired'] = 1;
       $book = Book::whereId($id)->update($data);
       return $book;
    }

    public function isBookRented(Request $request){
        $book_id = $request->get('book_id');
        $book_rented = Rent::where('book_id',$book_id)
            ->where('due_date', '>', Carbon::now())
            ->first();
        if(count($book_rented)>0){
            $rented = 1;
        }else $rented = 0;


        if(count($book_rented)<0){
            $book_acquired = Book::where('id',$book_id)->where('is_acquired',1)->get();
            if($book_acquired){
                $acquired = 1;
            } else $acquired = 0;
        }
        return response()->json(['status'=>'1','message'=>'Success','rented'=>$rented, 'acquired'=>$acquired])->setStatusCode(200);
    }

}
