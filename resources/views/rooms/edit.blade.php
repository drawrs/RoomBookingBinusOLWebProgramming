@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Room</h1>

        <form action="{{ route('rooms.update', $room->id) }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label for="room_type_id">Room Type</label>
                <select class="form-control" id="room_type_id" name="room_type_id">
                    @foreach($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}" {{ $roomType->id == $room->room_type_id ? 'selected' : '' }}>
                            {{ $roomType->room_type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="room_name">Room Name</label>
                <input type="text" class="form-control" id="room_name" name="room_name" value="{{ $room->room_name }}">
            </div>

            <div class="form-group">
                <label for="area">Area</label>
                <input type="number" class="form-control" id="area" name="area" value="{{ $room->area }}">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $room->price }}">
            </div>

            <div class="form-group">
                <label for="facility">Facility</label>
                <textarea class="form-control" id="facility" name="facility" rows="3">{{ $room->facility }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
