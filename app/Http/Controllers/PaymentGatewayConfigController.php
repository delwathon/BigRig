<?php

namespace App\Http\Controllers;

use App\Models\PaymentGatewayConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class PaymentGatewayConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all payment gateway configurations
        $gateways = PaymentGatewayConfig::all();

        // Decrypt secret keys ahead of time
        $gateways->transform(function ($gateway) {
            try {
                $gateway->decrypted_secret_key = Crypt::decryptString($gateway->secret_key);
            } catch (DecryptException $e) {
                $gateway->decrypted_secret_key = '';
            }
            return $gateway;
        });

        return view('pages.settings.payment-gateway-config', compact('gateways'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentGatewayConfig $paymentGatewayConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentGatewayConfig $paymentGatewayConfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the gateway config by ID
        $gateway = PaymentGatewayConfig::findOrFail($id);

        // Validate the incoming data
        $request->validate([
            'public_key' => 'nullable|string|max:255',
            'secret_key' => 'nullable|string|max:255',
            'merchant_email' => 'nullable|email|max:255',
            'sandbox' => 'required|boolean',
        ]);

        // Update the config
        $gateway->public_key = $request->public_key;
        $gateway->secret_key = Crypt::encryptString($request->secret_key); // Optionally encrypt
        $gateway->merchant_email = $request->merchant_email;
        $gateway->sandbox     = $request->sandbox;

        $gateway->save();

        return back()->with('success', "{$gateway->name} settings updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentGatewayConfig $paymentGatewayConfig)
    {
        //
    }

    public function toggle(Request $request, $id)
    {
        $gateway = PaymentGatewayConfig::findOrFail($id);
        $gateway->is_active = $request->is_active ? 1 : 0;
        $gateway->save();

        return back()->with('success', 'Gateway status updated');
    }
}
