<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\DetailTransaction;
use App\Room;
use App\Transaction;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_type == 'Admin') {
            return redirect()->route('transactions.index');
        }
        $rooms = Room::all();

        return view('home', compact('rooms'));
    }

    public function bookRoom(Request $request) {

        
        // return $extra_charge;
        // return $request->all();

        $room = Room::find($request->room_id);

        $transCode = Str::random(8);
        // return $room;
        // return $request->all();
        // Create a new transaction instance

        $extra_charge = 0;
        foreach ($request->extra_charges as $extra) {
            $extra_charge += $extra;
        }

        $transaction = new Transaction([
            'trans_code' => $transCode,
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
        return redirect()->route('home')->with('success', 'Book created successfully.');
    }

    public function history() {
        $transactions = Transaction::where('cust_name', Auth::user()->name)->get();
        return view('history', compact('transactions'));
    }

    public function showHistory($historyId){
        // Find the transaction by ID
        $transaction = Transaction::findOrFail($historyId);

        // Return the view for showing the transaction details
        return view('transactions.show', compact('transaction'));
    }
}
