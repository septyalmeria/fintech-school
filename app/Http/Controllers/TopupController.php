<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopupController extends Controller
{
    public function index()
    {
        $saldo = Balance::where("user_id", Auth::user()->id)->first();
        return view("pages.user.topup", compact("saldo"));
    }

    public function store(Request $request)
    {
        // dd(Balance::where("user_id", Auth::user()->id)->first()->saldo);
        if ($request->type == 1) {
            $invoice_id = "SAL_" . Auth::user()->id . now()->timestamp;

            Transaction::create([
                "user_id" => Auth::user()->id,
                "jumlah" => $request->jumlah,
                "invoice_id" => $invoice_id,
                "type" => $request->type,
                "status" => 2
            ]);

            return redirect()->back();
        }
    }
}
