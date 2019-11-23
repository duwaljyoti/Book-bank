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

    public function create()
    {
        $users = User::all();
        return view('books.form')
            ->with('users',$users);
    }

    public function edit($data)
    {
        $users = User::all();
        $books = Book::all();
        return view('books.form')
            ->with('users',$users)
            ->with('books',$books);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id'=>'required',
        ]);
        $datas = $request->all();
        $book = new Book();
        $result = $book->create($datas);
        if($result){
            $message='Successfully saved!';
            Session::flash('success_message', $message);
        }else{
            $message='Error !! Cound not  saved!';
            Session::flash('failed_message', $message);
        }
        return redirect();
    }

    public function update(Request $request, $data)
    {
        $this->validate($request,[
            'user_id'=>'required',
            'name'=>'required',
        ]);
        $datas = $request->all();
        $datas['name'] = $request->name;
        $datas['author']= $request->author;
        $result = $data->update($datas);
        if($result){
            $message = 'Data updated successfully';
            Session::flash('success_message', $message);
        }else{
            $message = 'Update failed';
            Session::flash('failed_message', $message);
        }
        return redirect('books.lists');
    }

    public function destroy($data)
    {
        $result = $data->delete();
        if($result){
            $message='Successfully Deleted!';
            Session::flash('success_message', $message);
        }else{
            $message='Data deletion failed!';
            Session::flash('failed_message', $message);
        }
        return redirect('books.lists');
    }
}
