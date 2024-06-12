<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminRoomController extends Controller
{
    public function index($hotel)
    {
        $rooms = Room::with('hotel')->get();
        return view('backend.rooms', compact('rooms' , 'hotel'));
    }

    public function create($hotel){
        $hotel_name = Hotel::find($hotel);
        return view('backend.roomCreate',compact('hotel_name','hotel'));
    }

    public function store(Request $request , $hotel){

        $validated = $request->validate([
            'number' => 'required|integer',
            'type' => 'required|in:single,double,suite',
            'status' => 'required|in:available,pending,booked',
            'price' => 'required|numeric',
        ]);

        $room = new Room;
        $room->hotel_id = $hotel;
        $room->number = $request->number;
        $room->type = $request->type;
        $room->status = $request->status;
        $room->price = $request->price;
        $room->save();
        return redirect()->back()->with('success' , 'Added! Add another room');
    }
    public function edit(Room $room)
    {
        $this->authorize('updateStatus', $room);
        return view('backend.roomEdit', compact('room'));
    }

    //here is example of using policy
    public function update(Request $request, Room $room)
    {
        $this->authorize('updateStatus', $room);

        $validated = $request->validate([
            'number' => 'required|integer',
            'type' => 'required|in:single,double,suite',
            'status' => 'required|in:available,pending,booked',
            'price' => 'required|numeric',
        ]);
        

        $room->number = $request->number;
        $room->type = $request->type;
        $room->status = $request->status;
        $room->price = $request->price;
        $room->save();

        return redirect()->back()->with('success', 'Room updated successfully.');
    }

    //here is examplr of using gates
    public function destroy(Room $room)
    {
        if (Gate::denies('admin-only')) {
            return redirect()->back()->with('error', 'You are not authorized to delete this room.');
        }

        $room->delete();

        return redirect()->back()->with('success', 'Room deleted successfully.');
    }
}
