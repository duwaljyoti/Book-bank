<?php

namespace App\Http\Controllers\API;

use App\Models\RequestBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function __construct()
    {

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
