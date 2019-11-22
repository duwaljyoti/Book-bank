<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BooksRequests extends Model
{
    protected $table = 'books_requests';

    protected $fillable = [
        'book_id',
        'request_id'
    ];

    public function book(): HasOne
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function request(): HasOne
    {
        return $this->hasOne(Request::class, 'id', 'request_id');
    }
}
