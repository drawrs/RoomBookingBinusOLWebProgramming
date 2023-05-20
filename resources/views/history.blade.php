@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Booking Historry</h1>
            <a href="{{ route('home') }}" class="btn btn-primary">Book Room</a>
        </div>

                    </div>
                    <div class="panel-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th>Transaction Code</th>
                                    <th>Transaction Date</th>
                                    <th>Customer Name</th>
                                    <th>Days</th>
                                    <th>Total Room Price</th>
                                    <th>Total Extra Charge</th>
                                    <th>Final Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <!-- <td>{{ $transaction->id }}</td> -->
                                        <td>{{ $transaction->trans_code }}</td>
                                        <td>{{ $transaction->trans_date }}</td>
                                        <td>{{ $transaction->cust_name }}</td>
                                        <td>{{ $transaction->detailTransaction->days }}</td>
                                        <td>{{ $transaction->total_room_price }}</td>
                                        <td>{{ $transaction->total_extra_charge }}</td>
                                        <td>{{ $transaction->final_total }}</td>
                                        <td>
                                            <a href="{{ route('user.history.show', $transaction->id) }}"
                                                class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
