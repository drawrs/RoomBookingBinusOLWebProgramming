@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Room Type</h1>

        <form action="{{ route('room_types.update', $roomType->id) }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label for="room_type">Room Type Name</label>
                <input type="text" class="form-control" id="room_type" name="room_type" value="{{ $roomType->room_type }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
