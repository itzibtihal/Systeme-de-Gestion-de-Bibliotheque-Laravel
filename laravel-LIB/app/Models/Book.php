<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable =[
        'title','image','author','genre','description','deleted','publication_year','total_copies','available_copies'
    ];
}
