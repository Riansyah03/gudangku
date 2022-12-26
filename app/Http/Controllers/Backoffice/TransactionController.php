<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function __invoke(Request $request)
    {
        if(Auth::user()->hasRole('admin')){
            $transactions = Transaction::search('invoice')
                ->with('details')
                ->latest()
                ->paginate(10)
                ->withQueryString();
        }else{
            $transactions = Transaction::search('invoice')
                ->with('details')
                ->where('user_id', Auth::id())
                ->latest()
                ->paginate(10)
                ->withQueryString();
        }
        return view('backoffice.transaction.transaction', compact('transactions'));
    }
}
