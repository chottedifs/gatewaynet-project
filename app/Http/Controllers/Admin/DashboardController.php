<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Package;
use App\Models\Spend;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard',[
            'user' => User::count(),
            'package' => Package::count(),
            'spend' => Spend::sum('price'),
            'success_payment' => Transaction::where('payment_status', '=', 'success')->count(),
            'failed_payment' => Transaction::where('payment_status', '=', 'failed')->count()
        ]);
    }
}
