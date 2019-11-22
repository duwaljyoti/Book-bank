<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rent extends Model
{
    protected $fillable = [
        'book_id',
        'from_date',
        'due_date',
        'rented_by'
    ];

    public function book(): HasOne
    {
        return $this->hasOne(Book::class);
    }
}
