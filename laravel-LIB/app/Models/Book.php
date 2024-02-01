<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Add this line

class Book extends Model
{
    use HasFactory, SoftDeletes; 

    protected $fillable = [
        'title', 'image', 'author', 'genre', 'description', 'deleted', 'publication_year', 'total_copies', 'available_copies'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

