<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\RoomType;

class RoomTypeController extends Controller
{
    public function index()
    {
        $room_types = RoomType::all();
        return view('room_types.index', compact('room_types'));
    }

    public function edit(RoomType $roomType)
    {
        // return $roomType;
        return view('room_types.edit', compact('roomType'));
    }

    public function update(Request $request, RoomType $roomType)
    {
        $this->validate($request, [
            'room_type' => 'required',
        ]);

        $roomType->update($request->all());

        return redirect()->route('room_types.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(RoomType $roomType)
    {
        $roomType->delete();

        return redirect()->route('room_types.index')->with('success', 'Room type deleted successfully.');
    }

    public function create()
    {
        return view('room_types.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'room_type' => 'required'
        ]);

        // Create a new room instance
        $room = new RoomType;
        $room->room_type = $request->room_type;
        $room->save();

        // Redirect to the index page with a success message
        return redirect()->route('room_types.index')->with('success', 'Room created successfully');
    }

}
