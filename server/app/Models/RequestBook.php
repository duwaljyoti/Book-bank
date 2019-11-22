<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RequestBook extends Model
{
    protected $fillable = [
        'book_id',
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
}
