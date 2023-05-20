<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <div>
        <form action="{{ route('transactions.report') }}" method="GET">
            <div>
                <label for="room_type">Room Type:</label>
                <select name="room_type" id="room_type">
                    <option value="">All</option>
                    @foreach ($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}">{{ $roomType->room_type }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="trans_date">Transaction Date:</label>
                <input type="date" name="trans_date" id="trans_date">
            </div>
            <div>
                <button type="submit">Filter</button>
            </div>
        </form>
    </div>

    <table border="1" style="border-collapse:collapse;" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Transaction Code</th>
                <th>Transaction Date</th>
                <th>Customer Name</th>
                <th>Room Name</th>
                <th>Room Type</th>
                <th>Number of Days</th>
                <th>Room Price</th>
                <th>Sub Total Room</th>
                <th>Total Room Price</th>
                <th>Extra Charge</th>
                <th>Total Extra Charge</th>
                <th>Final Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->trans_code }}</td>
                    <td>{{ $transaction->trans_date }}</td>
                    <td>{{ $transaction->cust_name }}</td>
                    <td>{{ $transaction->detailTransaction->room->room_name }}</td>
                    <td>{{ $transaction->detailTransaction->room->roomType->room_type }}</td>
                    <td>{{ $transaction->detailTransaction->days }}</td>
                    <td>{{ $transaction->detailTransaction->room->price }}</td>
                    <td>{{ $transaction->detailTransaction->sub_total_room }}</td>
                    <td>{{ $transaction->total_room_price }}</td>
                    <td>{{ $transaction->detailTransaction->extra_charge }}</td>
                    <td>{{ $transaction->total_extra_charge }}</td>
                    <td>{{ $transaction->final_total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
