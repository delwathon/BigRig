<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use Unicodeveloper\Paystack\Facades\Paystack;

class CheckoutController extends Controller
{
    public function index()
    {
        // Fetch the subscription details for this user
        $subscription = Subscription::where('user_id', Auth::user()->id)->first();
        $exchange_rate = 1750;
        $objectives = $subscription ? $subscription->objectives : [];

        // Check if payment status is 'completed'
        if ($subscription && $subscription->payment_status === 'completed') {
            return redirect('/dashboard'); // Redirect to dashboard if payment is complete
        }

        // Pass the subscription details to the view
        return view('checkout.pay', compact('subscription', 'objectives', 'exchange_rate'));
    }

    public function redirectToPaystack(Request $request)
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)->first();
        $exchange_rate = 1750;

        $amount = ($subscription->total_amount * $exchange_rate) * 100;

        $data = [
            'email' => $user->email,
            'amount' => $amount,
            'callback_url' => route('payment.callback'),
            'reference' => Paystack::genTranxRef(),
            'metadata' => [
                'user_id' => Auth::user()->id,
                'subscription_id' => $subscription->id,
            ],
        ];
        // dd($data);

        try {
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            return back()->with('error', 'Payment initialization failed. Please try again.');
        }
    }

    public function handleGatewayCallback(Request $request)
    {
        try {
            $paymentDetails = Paystack::getPaymentData();

            if ($paymentDetails['status'] && $paymentDetails['data']['status'] === 'success') {
                $user = Auth::user();
                // Update subscription or order status
                $subscription = Subscription::where('user_id', $user->id)->first();

                $subscription->payment_status = 'completed';
                $subscription->payment_reference = $paymentDetails['data']['reference'];
                $subscription->payment_method = 'Paystack';
                $subscription->save();

                $user->update(['user_visibility' => true]); // Update user visibility

                return redirect('/dashboard')->with('success', 'Payment successful!');
            }

            return redirect('/payment/failed')->with('error', 'Payment verification failed.');
        } catch (\Exception $e) {
            return redirect('/payment/failed')->with('error', 'An error occurred during payment verification.');
        }
    }

}
