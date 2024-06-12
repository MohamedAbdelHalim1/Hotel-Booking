<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AdminHomeController extends Controller
{
    public function index(){
        return view('backend.index');
    }
    public function bookings()
    {
        $bookings = Booking::all();
        return view('backend.bookings' , compact('bookings'));
    }

    public function hotels()
    {
        $hotels = Hotel::all();
        return view('backend.hotels' , compact('hotels'));
    }

    public function clients()
    {
        $users = User::where('role','client')->get();
        return view('backend.clients' , compact('users'));
    }

    public function staff()
    {
        $stuff = User::where('role','!=','client')->get();
        return view('backend.stuff' , compact('stuff'));
    }
    
}
