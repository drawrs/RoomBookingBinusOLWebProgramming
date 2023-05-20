@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Transaction Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Transaction Code: {{ $transaction->trans_code }}</h5>
                <p class="card-text">Transaction Date: {{ $transaction->trans_date }}</p>
                <p class="card-text">Customer Name: {{ $transaction->cust_name }}</p>
                
                
                

                <h3>Room</h3>
                <p class="card-text">Room Name: {{ $transaction->detailTransaction->room->room_name }}</p>
                <p class="card-text">Room Type: {{ $transaction->detailTransaction->room->roomType->room_type }}</p>
                <p class="card-text">Number of days: {{ $transaction->detailTransaction->days }}</p>
                <p class="card-text">Room price: {{ $transaction->detailTransaction->room->price }}</p>
                <p class="card-text">Sub total room: {{ $transaction->detailTransaction->sub_total_room }}</p>
                <p class="card-text">Total Room Price: {{ $transaction->total_room_price }}</p>

                <h3>Extra Charge</h3>
                <p class="card-text">Extra Charge: {{ $transaction->detailTransaction->extra_charge }}</p>
                <p class="card-text">Total Extra Charge: {{ $transaction->total_extra_charge }}</p>
                <h3>Total</h3>
                <p class="card-text">Final Total: {{ $transaction->final_total }}</p>
            </div>
        </div>

        @if(Auth::user()->user_type == "Admin")
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary mt-3">Back to Transactions</a>
        @else
            <a href="{{ route('history') }}" class="btn btn-secondary mt-3">Back to History</a>
        @endif

        
    </div>
@endsection
