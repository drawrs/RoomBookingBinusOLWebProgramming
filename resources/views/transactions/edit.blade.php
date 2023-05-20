@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Transaction</h1>

        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            {{ method_field('PUT') }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="trans_code">Transaction Code</label>
                <input type="text" class="form-control" id="trans_code" name="trans_code" value="{{ $transaction->trans_code }}">
            </div>

            <div class="form-group">
                <label for="trans_date">Transaction Date</label>
                <input type="date" class="form-control" id="trans_date" name="trans_date" value="{{ $transaction->trans_date }}">
            </div>

            <div class="form-group">
                <label for="cust_name">Customer Name</label>
                <input type="text" class="form-control" id="cust_name" name="cust_name" value="{{ $transaction->cust_name }}">
            </div>

            <div class="form-group">
                <label for="total_room_price">Total Room Price</label>
                <input type="number" class="form-control" id="total_room_price" name="total_room_price" value="{{ $transaction->total_room_price }}">
            </div>

            <div class="form-group">
                <label for="total_extra_charge">Total Extra Charge</label>
                <input type="number" class="form-control" id="total_extra_charge" name="total_extra_charge" value="{{ $transaction->total_extra_charge }}">
            </div>

            <div class="form-group">
                <label for="final_total">Final Total</label>
                <input type="number" class="form-control" id="final_total" name="final_total" value="{{ $transaction->final_total }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Transaction</button>
        </form>
    </div>
@endsection
