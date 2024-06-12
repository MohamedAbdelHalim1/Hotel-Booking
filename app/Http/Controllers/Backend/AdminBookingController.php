<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class AdminBookingController extends Controller
{

    public function edit($id){
        $status = Booking::where('id',$id)->pluck('status')->first();
        return view('backend.bookingEdit',compact('status','id'));
    }

    public function update(Request $request , $id){
        $validated = $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();
        return redirect()->route('admin.bookings')->with('success' , 'Status Updated');

    }

    public function destroyBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('admin.bookings')->with('success', 'Booking deleted successfully');
    }
}

