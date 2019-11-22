<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {

    }

    public function CategoryApi()
    {
        $categories = Category::all();
        $category_list['status'] = '1';
        $category_list['message'] = 'Success';
        foreach($categories as $key=>$category){
            $category_list['data'] [] = [
                "name" =>$category->name,
            ];
        }

        return response()->json($category_list)->setStatusCode(200);
    }
}
