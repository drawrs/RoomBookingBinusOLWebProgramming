@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Room</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('rooms.store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="room_type_id">Room Type <a href="{{ route('room_types.create') }}">[+ create]</a></label>
                <select class="form-control" id="room_type_id" name="room_type_id">
                    @foreach ($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}">{{ $roomType->room_type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="room_name">Room Name</label>
                <input type="text" class="form-control" id="room_name" name="room_name" required>
            </div>

            <div class="form-group">
                <label for="area">Area</label>
                <input type="number" class="form-control" id="area" name="area" required>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="facility">Facility</label>
                <textarea class="form-control" id="facility" name="facility" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
