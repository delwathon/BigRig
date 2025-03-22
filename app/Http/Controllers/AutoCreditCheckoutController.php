<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use Illuminate\Support\Facades\Http;

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

    public function redirectToMonicredit(Request $request)
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)->first();
        $exchange_rate = 1750;

        $amount = ($subscription->total_amount * $exchange_rate);
        $data = [
            'order_id' => uniqid('MONI_'),
            'public_key' => 'PUB_DEMO_AC65D3514175B8C', // Replace with your Monicredit public key
            'customer' => [
                'first_name' => $user->firstName,
                'last_name' => $user->lastName,
                'email' => $user->email,
                'phone' => $user->mobileNumber,
                'bvn' => '2231919006',
            ],
            'items' => [],
            'currency' => 'NGN',
            'paytype' => 'standard',
            'callback_url' => route('payment.callback'),
        ];

        try {
            $response = Http::post('https://demo.backend.monicredit.com/v1/payment/transactions/init-transaction', $data);
            dd($response);
            if ($response->successful() && isset($response['authorization_url'])) {
                return redirect($response['authorization_url']);
            } else {
                return back()->with('error', 'Payment initialization failed. Please try again.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function handleMonicreditCallback(Request $request)
    {
        try {
            $transaction_id = $request->input('transaction_id');
            $response = Http::get("https://demo.backend.monicredit.com/v1/payment/transactions/$transaction_id");

            if ($response->successful() && $response['data']['status'] === 'success') {
                $user = Auth::user();
                $subscription = Subscription::where('user_id', $user->id)->first();

                $subscription->payment_status = 'completed';
                $subscription->payment_reference = $response['data']['transaction_id'];
                $subscription->payment_method = 'Monicredit';
                $subscription->save();

                $user->update(['user_active' => true]);

                return redirect('/dashboard')->with('success', 'Payment successful!');
            }

            return redirect('/payment/failed')->with('error', 'Payment verification failed.');
        } catch (\Exception $e) {
            return redirect('/payment/failed')->with('error', 'An error occurred during payment verification.');
        }
    }
}
