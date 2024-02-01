<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $dates = ['reservation_date', 'return_date'];

    protected $fillable = [
        'user_id',
        'book_id',
        'reservation_date',
        'return_date',
        'is_returned',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
