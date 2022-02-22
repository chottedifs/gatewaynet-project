<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Auth;
use Str;
use Midtrans;

class MonthlyBillingController extends Controller
{
    public function __construct()
    {
        Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with('User','Package')->whereUserId(Auth::id())->get();

        return view('pages.user.billing',[
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->getSnapRedirect($transaction);

        return view('pages.user.billing');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function midtransCallback(Request $request)
     {
         $notif = $request->method() == 'POST' ? new Midtrans\Notification() : Midtrans\Transaction::status($request->order_id);

         $transaction_status = $notif->transaction_status;
         $fraud = $notif->fraud_status;

         $transaction_id = explode('-', $notif->order_id)[0];
         $transaction = Transaction::find($transaction_id);

         if ($transaction_status == 'capture') {
             if ($fraud == 'challenge') {
             // TODO Set payment status in merchant's database to 'challenge'
                 $transaction->payment_status = 'pending';
             }
             else if ($fraud == 'accept') {
             // TODO Set payment status in merchant's database to 'success'
                 $transaction->payment_status = 'success';
             }
         }
         else if ($transaction_status == 'cancel') {
             if ($fraud == 'challenge') {
             // TODO Set payment status in merchant's database to 'failure'
             $transaction->payment_status = 'failed';
             }
             else if ($fraud == 'accept') {
             // TODO Set payment status in merchant's database to 'failure'
                 $transaction->payment_status = 'failed';
             }
         }
         else if ($transaction_status == 'deny') {
             // TODO Set payment status in merchant's database to 'failure'
             $transaction->payment_status = 'failed';
         }
         else if ($transaction_status == 'settlement') {
             // TODO set payment status in merchant's database to 'Settlement'
             $transaction->payment_status = 'success';
         }
         else if ($transaction_status == 'pending') {
             // TODO set payment status in merchant's database to 'Pending'
             $transaction->payment_status = 'pending';
         }
         else if ($transaction_status == 'expire') {
             // TODO set payment status in merchant's database to 'expire'
             $transaction->payment_status = 'failed';
         }

         $transaction->save();
         return view('pages.user.success');
     }
}
