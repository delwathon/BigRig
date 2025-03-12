<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

class TransactionController extends Controller
{
    // public function index01()
    // {
    //     $user = Auth::user();

    //     // Check subscription payment status
    //     $subscription = Subscription::where('user_id', $user->id)->first();

    //     if ($subscription && $subscription->payment_status === 'pending') {
    //         // Redirect to checkout/pay if payment is still pending
    //         return redirect('/checkout/pay');
    //     }

    //     $transactions = Subscription::simplePaginate(10);
    //     return view('pages/payment/transactions', compact('transactions'));  
    // }

    public function index()
    {
        $transactions = Subscription::with('user', )->orderBy('updated_at', 'desc')->simplePaginate(10);
        $totalAmount = Subscription::where('payment_status', 'completed')->sum('total_amount');
        return view('pages/payment/index', compact('transactions', 'totalAmount'));  
    }  
}
