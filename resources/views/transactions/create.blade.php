@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Transaction</h1>

        <form action="{{ route('transactions.store') }}" method="POST">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">


            <div class="form-group">
                <label for="trans_code">Transaction Code</label>
                <input type="text" name="trans_code" id="trans_code" class="form-control" value="{{ $transCode }}" required>
            </div>

            <div class="form-group">
                <label for="trans_date">Transaction Date</label>
                <input type="date" name="trans_date" id="trans_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cust_name">Customer Name</label>
                <input type="text" name="cust_name" id="cust_name" class="form-control" required>
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
                <button type="submit" class="btn btn-primary">Create Transaction</button>
            </div>
        </form>
    </div>
@endsection
