@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Transactions</h1>
            <a href="{{ route('transactions.create') }}" class="btn btn-primary">Create Transaction</a>
            <a href="{{ route('transactions.report') }}" class="btn btn-primary">View Report</a>
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
                                    <th>ID</th>
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
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->trans_code }}</td>
                                        <td>{{ $transaction->trans_date }}</td>
                                        <td>{{ $transaction->cust_name }}</td>
                                        <td>{{ $transaction->detailTransaction->days }}</td>
                                        <td>{{ $transaction->total_room_price }}</td>
                                        <td>{{ $transaction->total_extra_charge }}</td>
                                        <td>{{ $transaction->final_total }}</td>
                                        <td>
                                            <a href="{{ route('transactions.show', $transaction->id) }}"
                                                class="btn btn-primary">View</a>
                                            <a href="{{ route('transactions.edit', $transaction->id) }}"
                                                class="btn btn-primary">Edit</a>

                                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this transaction?')">Delete</button>
                                                </form>
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
