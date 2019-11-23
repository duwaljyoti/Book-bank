<?php

namespace App\Http\Controllers\API;

use App\Http\Services\CommonService;
use App\Models\Book;
use App\Models\BooksRequests;
use App\Models\RequestBook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    private $commonService;
    private $requestBookModel;
    private $bookModel;
    private $booksRequestsModel;

    public function __construct(
        CommonService $commonService,
        RequestBook $requestBookModel,
        Book $bookModel,
        BooksRequests $booksRequestsModel
    ) {
        $this->commonService = $commonService;
        $this->requestBookModel = $requestBookModel;
        $this->bookModel = $bookModel;
        $this->booksRequestsModel = $booksRequestsModel;
    }

    public function create(Request $request)
    {
        $request_info = $this->commonService->save($this->requestBookModel, $request->get('requested'));

        $request_id = $request_info['id'];
        $books = $request->get('books');

        foreach ($books as $book) {
            $book_info[]['book_id'] = $this->commonService->saveMany($this->bookModel, $book);
        }

        $formattedBookInfos = array_map(function($book) use ($request_id) {
            $book['request_id'] = $request_id;
            return $book;
        }, $book_info);

        foreach ($formattedBookInfos as $formattedBookInfo)
        {
            $this->commonService->saveMany($this->booksRequestsModel, $formattedBookInfo);
        }

        return $this->commonService->find($this->requestBookModel, $request_info['id'], ['booksRequests.book']);
    }

    public function bookRequest()
    {
        $request_books = RequestBook::all();
        $request_book_list['status'] = '1';
        $request_book_list['message'] = 'Success';
        foreach($request_books as $key=>$request_book){
            $request_book_list['data'] [] = [
                "is_mass" =>$request_book->is_mass,
                "number_of_books" =>$request_book->number_of_books,
                "organization_name" =>$request_book->organization_name,
                "pan_no" =>$request_book->pan_no,
                "reason" =>$request_book->reason,
            ];
        }

        return response()->json($request_book_list)->setStatusCode(200);
    }
}
