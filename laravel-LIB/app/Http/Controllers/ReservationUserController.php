<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationFormRequest;
use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationUserController extends Controller
{


    public function index()
    {
        $books = Book::all();
        session(['user_id' => Auth::user()->id]);
        return view('users.index', ['books' => $books]);
    }

    // public function store(ReservationFormRequest $request, Book $book)
    // {
    //     Reservation::create($request->all() + ['user_id' => session('user_id')]);
    //     $book->decrement('available_copies');
    //     return redirect(route('users.index'))->with('success', 'Reservation created successfully!');
    // }
}