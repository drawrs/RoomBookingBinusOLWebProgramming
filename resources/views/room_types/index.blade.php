@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Room Types</h1>
            </div>
            <div class="col-md-6 text-right">
                <br>
                <a href="{{ route('room_types.create') }}" class="btn btn-primary">Create Room Type</a>
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($room_types as $room_type)
                    <tr>
                        <td>{{ $room_type->id }}</td>
                        <td>{{ $room_type->room_type }}</td>
                        <td>
                            <a href="{{ route('room_types.edit', $room_type->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('room_types.destroy', $room_type->id) }}" method="POST" style="display: inline;">
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
