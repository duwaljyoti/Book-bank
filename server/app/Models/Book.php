<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'author',
        'publication',
        'is_for_rent',
        'is_request',
        'image',
        'category_id',
        'description',
        'price',
        'discounted_price',
        'is_acquired',
        'is_request'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
