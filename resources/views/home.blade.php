@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Book Room</div>

                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('user.rooms.book') }}" method="POST">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="trans_date">Date</label>
                            <input type="date" name="trans_date" id="trans_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="cust_name">Customer Name</label>
                            <input type="text" name="cust_name" id="cust_name" class="form-control" value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="room_type_id">Room</label>
                            <select class="form-control" id="room_id" name="room_id">
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        

                        <div class="form-group">
                            <label for="days">Number of days</label>
                            <input type="number" name="days" id="days" class="form-control" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="extra_charge">Extra Charge</label>
                            <input type="number" name="extra_charge" id="extra_charge" class="form-control" required>
                        </div> -->
                        <div class="form-group">
                            <label>Extra Charges:</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="extra_charges[]" value=20000> Minuman soda (20.000)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="extra_charges[]" value=15000> Air Putih (15.000)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="extra_charges[]" value=100000> Jasa Laundry (100.000)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="extra_charges[]" value=25000> Snack (25.000)
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
