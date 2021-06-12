<?php

namespace App\Http\Controllers;

use App\Item;
use App\Transaction;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $transactions = Transaction::orderBy('updated_at','DESC')->where('user_id', auth()->user()->id)
        ->with('transactionable', 'userbuyitem', 'userbuyitem.item', 'usergiftcard', 'usergiftcard.giftcard')->get();

     
        // foreach($transactions as $transaction){
        //     dd($transaction->userbuyitem);
        // }
        return view('home', compact('transactions'));
    }
}
