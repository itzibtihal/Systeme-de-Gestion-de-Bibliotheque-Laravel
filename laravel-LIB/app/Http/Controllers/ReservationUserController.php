<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationFormRequest;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationUserController extends Controller
{


    public function index()
    {
        $books = Book::all();

        if (Auth::check()) {
            $userReservationsCount = Reservation::where('user_id', Auth::id())->count();
            $user = User::find(Auth::id());
        } else {
            $userReservationsCount = 0; 
            $user = null; 
        }

        return view('users.index', ['books' => $books, 'userReservationsCount' => $userReservationsCount, 'user' => $user]);
    }

    

    public function create(Book $book)
    {
        return view('users.index', ['book' => $book]);
    }


    public function store(ReservationFormRequest $request)
{
    $reservation = Reservation::create($request->all());
    if ($reservation->book) {
        $book = $reservation->book;
        $book->decrement('available_copies');
        return redirect(route('myreservations.index'))->with('success', 'Reservation created successfully!');
    } else {
        
        return redirect(route('myreservations.index'))->with('error', 'Error creating reservation. Please check the book information.');
    }
}


    
}