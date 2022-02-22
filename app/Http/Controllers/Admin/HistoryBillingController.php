<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class HistoryBillingController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('User')->get();
        return view('pages.admin.billing.history',[
            'transactions' => $transactions
        ]);
    }
}
