<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Canteen;
use App\Rules\balanceRule;

class CanteenController extends Controller
{
    public function index()
    {
        return view('balance', [
            'title' => 'Balance'
        ]);
    }
    public function addBalance(Request $request)
    {
        $validatedRequest = $request->validate([
            'amount' => 'required|integer|min:1'
        ]);
        $validatedRequest['amount'] = Canteen::first()->balance + $validatedRequest['amount'];
        Canteen::first()->update([
            'balance' => $validatedRequest['amount']
        ]);
        return redirect()->back();
    }
    public function withdraw(Request $request)
    {
        $validatedRequest = $request->validate([
            'amount' => ['required', 'integer', new balanceRule()]
        ]);
        $validatedRequest['amount'] = Canteen::first()->balance - $validatedRequest['amount'];
        Canteen::first()->update([
            'balance' => $validatedRequest['amount']
        ]);
        return redirect()->back();
    }
}
