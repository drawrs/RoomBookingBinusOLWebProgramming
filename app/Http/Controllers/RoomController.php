<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\RoomType;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function edit(Room $room)
    {
        $roomTypes = RoomType::all();
        return view('rooms.edit', compact('room', 'roomTypes'));
    }

    public function update(Request $request, Room $room)
    {
        $this->validate($request, [
            'room_type_id' => 'required',
            'room_name' => 'required',
            'area' => 'required|integer',
            'price' => 'required|numeric',
            'facility' => 'required',
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }

    public function create()
    {
        $roomTypes = RoomType::all();

        return view('rooms.create', compact('roomTypes'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'room_type_id' => 'required',
            'room_name' => 'required',
            'area' => 'required',
            'price' => 'required',
            'facility' => 'required',
        ]);

        // Create a new room instance
        $room = new Room;
        $room->room_type_id = $request->room_type_id;
        $room->room_name = $request->room_name;
        $room->area = $request->area;
        $room->price = $request->price;
        $room->facility = $request->facility;
        $room->save();

        // Redirect to the index page with a success message
        return redirect()->route('rooms.index')->with('success', 'Room created successfully');
    }

}
