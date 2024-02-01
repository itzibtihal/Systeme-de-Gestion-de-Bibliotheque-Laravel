<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        $booksCount = Book::count();
        // i can use scopes here 
        $todayReservationsCount = Reservation::whereDate('created_at', Carbon::today())->count();
        $usersCount = User::whereNull('is_admin')->count();
        $availableCopiesCount = Book::sum('available_copies');
       

       
        return view('dashboard.index', [
            'booksCount' => $booksCount,
            'todayReservationsCount' => $todayReservationsCount,
            'usersCount' => $usersCount,
            'availableCopiesCount'=>$availableCopiesCount,
        ]);
        
    }
}