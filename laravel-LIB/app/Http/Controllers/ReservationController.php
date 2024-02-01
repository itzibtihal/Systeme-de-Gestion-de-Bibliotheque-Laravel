<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationFormRequest;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', ['reservations' => $reservations]);
    }


    public function create()
    {
        return view('reservations.create');
    }

    public function store(ReservationFormRequest $request)
    {
        $reservation = Reservation::create($request->all());
        $book = $reservation->book;
        $book->decrement('available_copies');
        return redirect(route('reservations.index'))->with('success', 'Reservation created successfully!');
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
