<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $users = User::all();
        $items = Item::all();
        return view("pages.user.transaction", compact("users", "items"));
    }

    // public function store(Request $request){
    //     if($request->type == 1){
    //         $invoice_id = "SAL_" . Auth::user()->id . now()->timestamp;

    //         Transaction::create([
    //             "user_id" => Auth::user()->id,
    //             "amount" => $request->amount,
    //             "invoice_id" => $invoice_id,
    //             "type" => $request->type,
    //             "status" => 2
    //         ]);

    //         return redirect()->back()->with("status", "Top Up on Proccess");
    //     }
    // }
}
