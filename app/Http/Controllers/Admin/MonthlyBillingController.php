<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Package;
use App\Http\Requests\Admin\TransactionRequest;
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
        $transactions = Transaction::with('User')->get();
        return view('pages.admin.billing.index',[
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
        $users = User::all();
        $packages = Package::all();
        return view('pages.admin.billing.create', [
            'users' => $users,
            'packages' => $packages
        ]);
    }

    public function store(TransactionRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = $request->input('name');
        $data['package_id'] = $request->input('package');
        $data['period_month'] = $request->input('period_month');

        $transaction = Transaction::create($data);
        $this->getSnapRedirect($transaction);

        Session::flash('success','Tagihan '.$transaction->User->name.' Berhasil Dibuat');
        return redirect(route('admin.billing.index'));
    }


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
        $users = User::all();
        $packages = Package::all();
        $transactions = Transaction::findOrFail($id);

        return view('pages.admin.billing.edit',[
            'transactions' => $transactions,
            'users' => $users,
            'packages' => $packages
        ]);
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
        $data = $request->all();
        $data['package_id'] = $request->input('package');

        $transactions = Transaction::findOrFail($id);
        $transactions ->update($data);
        return redirect(route('admin.billing.index'));;
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

     // Midtrans Handler
     public function getSnapRedirect(Transaction $transaction)
     {
         $orderId = $transaction->id.'-'.Str::random(5);
         $price = $transaction->Package->price;
         $transaction->midtrans_booking_code = $orderId;

         $transaction_details = [
             'order_id' => $orderId,
             'gross_amount' => $price
         ];

         $item_details[] = [
             'id' => $orderId,
             'price' => $price,
             'quantity' => 1,
             'name' => "Paket internet {$transaction->Package->title}"
         ];

         $userData = [
             'first_name' => $transaction->User->name,
             'last_name' => "",
             'address' => $transaction->User->address,
             'city' => "",
             'postal_code' => "",
             'phone' => $transaction->User->phone,
             'country_code' => "IDN",
         ];

         $customerDetails = [
             'first_name' => $transaction->User->name,
             'last_name' => "",
             'email' => $transaction->User->email,
             'phone' => $transaction->User->phone,
             'billing_address' => $userData,
             'shipping_address' => $userData
         ];

         $midtrans_params = [
             'transaction_details' => $transaction_details,
             'customer_details' => $customerDetails,
             'item_details' => $item_details
         ];

         try {
             //code...
             $paymentUrl = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
             $transaction->midtrans_url = $paymentUrl;
             $transaction->update();

             return $paymentUrl;
         } catch (Exception $e) {
             return false;
         }
     }

     public function midtransCallback(Request $request)
     {
         $notif = $request->method() == 'POST' ? new Midtrans\Notification() : Midtrans\Transaction::status($request->order_id);

         $transaction_status = $notif->transaction_status;
         $fraud = $notif->fraud_status;

         $transactions_id = explode('-', $notif->order_id)[0];
         $transactions = Transaction::find($transactions_id);

         if ($transaction_status == 'capture') {
             if ($fraud == 'challenge') {
             // TODO Set payment status in merchant's database to 'challenge'
                 $transactions->payment_status = 'pending';
             }
             else if ($fraud == 'accept') {
             // TODO Set payment status in merchant's database to 'success'
                 $transactions->payment_status = 'success';
             }
         }
         else if ($transaction_status == 'cancel') {
             if ($fraud == 'challenge') {
             // TODO Set payment status in merchant's database to 'failure'
             $transactions->payment_status = 'failed';
             }
             else if ($fraud == 'accept') {
             // TODO Set payment status in merchant's database to 'failure'
                 $transactions->payment_status = 'failed';
             }
         }
         else if ($transaction_status == 'deny') {
             // TODO Set payment status in merchant's database to 'failure'
             $transactions->payment_status = 'failed';
         }
         else if ($transaction_status == 'settlement') {
             // TODO set payment status in merchant's database to 'Settlement'
             $transactions->payment_status = 'success';
         }
         else if ($transaction_status == 'pending') {
             // TODO set payment status in merchant's database to 'Pending'
             $transactions->payment_status = 'pending';
         }
         else if ($transaction_status == 'expire') {
             // TODO set payment status in merchant's database to 'expire'
             $transactions->payment_status = 'failed';
         }

         $transactions->save();
         return view('pages.user.success');
     }
}
