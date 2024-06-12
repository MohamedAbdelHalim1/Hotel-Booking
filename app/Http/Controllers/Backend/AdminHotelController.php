<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;

class AdminHotelController extends Controller
{


    public function create(){
        return view('backend.hotelCreate');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'stars' => 'required|integer',
        ]);

        $hotel = new Hotel;
        $hotel->name = $request->name;
        $hotel->city = $request->city;
        $hotel->stars = $request->stars;
        $hotel->save();
        return redirect()->route('admin.hotels')->with('success', 'Hotel Added successfully!');


    }
    public function show(Hotel $hotel)
    {
        return view('backend.hotelShow', compact('hotel'));
    }

    public function edit(Hotel $hotel)
    {
        return view('backend.hotelEdit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'stars' => 'required|integer',
        ]);

        $hotel->name = $request->name;
        $hotel->city = $request->city;
        $hotel->stars = $request->stars;
        $hotel->save();

        return redirect()->route('admin.hotels')->with('success', 'Hotel updated successfully!');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('admin.hotels')->with('success', 'Hotel deleted successfully!');
    }

}
