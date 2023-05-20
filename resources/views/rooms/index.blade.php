@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Rooms</h1>
            </div>
            <div class="col-md-6 text-right">
                <br>
                <a href="{{ route('rooms.create') }}" class="btn btn-primary">Create Room</a>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room Type</th>
                    <th>Room Name</th>
                    <th>Area</th>
                    <th>Price</th>
                    <th>Facility</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->roomType->room_type }}</td>
                        <td>{{ $room->room_name }}</td>
                        <td>{{ $room->area }}</td>
                        <td>{{ $room->price }}</td>
                        <td>{{ $room->facility }}</td>
                        <td>
                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display: inline;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
