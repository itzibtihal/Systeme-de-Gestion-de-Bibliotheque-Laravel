<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationFormRequest;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        $user = User::find(Auth::id());
        return view('reservations.index', ['reservations' => $reservations, 'user' => $user]);
    }


    public function create()
    {
        return view('reservations.create');
    }

    public function store(ReservationFormRequest $request)
{
    $reservation = Reservation::create($request->all());

    if ($reservation->book) {
        $book = $reservation->book;
        $book->decrement('available_copies');
        return redirect(route('reservations.index'))->with('success', 'Reservation created successfully!');
    } else {
        
        return redirect(route('reservations.index'))->with('error', 'Error creating reservation. Please check the book information.');
    }
}



    public function show(Reservation $reservation)
    {
        return view('reservations.show', ['reservation' => $reservation]);
    }

    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', ['reservation' => $reservation]);
    }

    public function update(ReservationFormRequest $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        return redirect(route('reservations.index'))->with('success', 'Reservation updated successfully!');
    }


    public function destroy(Reservation $reservation)
    {
        $book = $reservation->book;
        $book->increment('available_copies');
        $reservation->delete();
        return redirect(route('reservations.index'))->with('success', 'Reservation deleted successfully!');
    }
}
