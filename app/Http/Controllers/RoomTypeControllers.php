<?php

namespace App\Http\Controllers;

use App\RoomType;
use Illuminate\Http\Request;

class RoomTypeControllers extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();
        return view('room_types.index', compact('roomTypes'));
    }

    public function create()
    {
        return view('room_types.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'room_type' => 'required',
        ]);

        RoomType::create([
            'room_type' => $request->room_type,
        ]);

        return redirect()->route('room_types.index')
            ->with('success', 'Room type created successfully');
    }

    public function edit(RoomType $roomType)
    {
        return $roomType;
        return view('room_types.edit', compact('roomType'));
    }

    public function update(Request $request, RoomType $roomType)
    {
        $this->validate($request, [
            'room_type' => 'required',
        ]);

        $roomType->update([
            'room_type' => $request->room_type,
        ]);

        return redirect()->route('room_types.index')
            ->with('success', 'Room type updated successfully');
    }

    public function destroy(RoomType $roomType)
    {
        $roomType->delete();

        return redirect()->route('room_types.index')
            ->with('success', 'Room type deleted successfully');
    }
}
