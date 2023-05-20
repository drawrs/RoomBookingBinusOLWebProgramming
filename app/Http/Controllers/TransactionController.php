<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Transaction;
use App\DetailTransaction;
use App\Room;
use App\RoomType;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        // Return the view for creating a new transaction
        $rooms = Room::all();
        $transCode = Str::random(8);

        return view('transactions.create', compact('rooms', 'transCode'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'trans_code' => 'required',
            'trans_date' => 'required',
            'cust_name' => 'required',
            // 'total_room_price' => 'required',
            // 'total_extra_charge' => 'required',
            // 'final_total' => 'required',
        ]);

        $room = Room::find($request->room_id);

        // return $room;
        // return $request->all();
        // Create a new transaction instance

        $extra_charge = 0;
        foreach ($request->extra_charges as $extra) {
            $extra_charge += $extra;
        }

        $transaction = new Transaction([
            'trans_code' => $request->trans_code,
            'trans_date' => $request->trans_date,
            'cust_name' => $request->cust_name,
            'total_room_price' => $request->days * ( $room->price + $extra_charge),
            'total_extra_charge' => $request->days * $extra_charge,
            'final_total' => $request->days * ( $room->price + $extra_charge),
        ]);

        // Save the transaction
        $transaction->save();

        // return $transaction->id;

        // return $request->extra_charge;

        $deatilTransaction = new DetailTransaction([
            'trans_id' => $transaction->id,
            'room_id' => $request->room_id,
            'days' => $request->days,
            'extra_charge' => $extra_charge,
            'sub_total_room' => $request->days * $room->price,
        ]);

        
        $deatilTransaction->save();

        // Redirect to the index page with success message
        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show($id)
    {
        // Find the transaction by ID
        $transaction = Transaction::findOrFail($id);

        // Return the view for showing the transaction details
        return view('transactions.show', compact('transaction'));
    }

    public function edit($id)
    {
        // Find the transaction by ID
        $transaction = Transaction::findOrFail($id);

        // Return the view for editing the transaction
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $this->validate($request, [
            'trans_code' => 'required',
            'trans_date' => 'required',
            'cust_name' => 'required',
            'total_room_price' => 'required',
            'total_extra_charge' => 'required',
            'final_total' => 'required',
        ]);

        // Find the transaction by ID
        $transaction = Transaction::findOrFail($id);

        // Update the transaction data
        $transaction->trans_code = $request->trans_code;
        $transaction->trans_date = $request->trans_date;
        $transaction->cust_name = $request->cust_name;
        $transaction->total_room_price = $request->total_room_price;
        $transaction->total_extra_charge = $request->total_extra_charge;
        $transaction->final_total = $request->final_total;

        // Save the updated transaction
        $transaction->save();

        // Redirect to the index page with success message
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy($id)
    {
        // Find the transaction by ID and delete it
        Transaction::findOrFail($id)->delete();

        // Redirect to the index page with success message
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }

    public function report() {
        $transactions = Transaction::all();
        $roomTypes = RoomType::all();

        return view('transactions.report', compact('transactions', 'roomTypes'));
    }
}
