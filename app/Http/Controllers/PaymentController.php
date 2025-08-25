<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

class PaymentController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $payments = Subscription::with('user')
            ->when($user->roles->contains('id', 10), function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->where('payment_status', 'completed')
            ->orderBy('updated_at', 'desc')
            ->simplePaginate(10);

        $totalAmount = Subscription::with('user')
            ->when($user->roles->contains('id', 10), function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->where('payment_status', 'completed')
            ->sum('total_amount');

        return view('pages/payment/index', compact('payments', 'totalAmount'));  
    }  
}
