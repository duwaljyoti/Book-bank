<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\User;
use App\Models\RequestBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index()
    {
        $books_count = Book::all()->count();
        $user_count = User::all()->count();
        $mass_request_count = RequestBook::where('is_mass',1)->count();
        $personal_request_count = RequestBook::where('is_mass',0)->count();

        $data = [
            'books_count'  => $books_count,
            'user_count'   => $user_count,
            'mass_request_count'   => $mass_request_count,
            'personal_request_count'   => $personal_request_count
        ];

        return View::make('dashboard/dashboard')->with($data);
    }
}
