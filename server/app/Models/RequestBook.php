<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RequestBook extends Model
{

    protected $table = 'request_books';
    protected $fillable = [
        'requested_by',
        'is_mass',
        'number_of_books',
        'organization_name',
        'pan_no',
        'reason',
    ];

    public function book(): HasOne
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function booksRequests(): HasMany
    {
        return $this->hasMany(BooksRequests::class, 'request_id');
    }
}
