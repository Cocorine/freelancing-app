<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Str;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function withdraw_fund(Request $request,$id)
    {

        $request->validate([
            'cvv' => 'required',
            'card_type' => 'required',
            'expire_on' => 'required',
            'card_number' => 'required',
            'amount' => 'required|integer',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);

        $wallet = Wallet::findOrfail(intval($id));

        if($request->amount > $wallet->account_wallet){
            return back()->withErrors('The withdrawal amount must not be greater than your account balance.');
        }

        $wallet->update([
            'account_wallet' =>  $wallet->account_wallet - $request->amount
        ]);

        Transaction::create([
            'transaction_number' => Str::random(6),
            'amount' => intval($request->amount),
            'wallet_id' => $wallet->id,
        ]);

        return back()->withSuccess('Withdrawal successful');
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
        $wallet = Wallet::findOrfail($id);
        //$payments = Payment::all();
        return view('livewire.backend.payments.index',compact('wallet'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function withdraw_form($id)
    {
        $wallet = Wallet::findOrfail($id);
        //$payments = Payment::all();
        return view('livewire.backend.payments.withdraw',compact('wallet'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function transactions($id)
    {
        $wallet = Wallet::findOrfail($id);
        $transactions = Transaction::where('wallet_id',$wallet->id)->get();
        return view('livewire.backend.payments.transactions',compact('wallet','transactions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoices($id)
    {
        $wallet = Wallet::findOrfail($id);
        $invoices = Transaction::where('wallet_id',$wallet->id)->where('motif','paie')->get();
        return view('livewire.backend.payments.invoices',compact('wallet','invoices'));
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
        //
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
}
