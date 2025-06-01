<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentGatewayConfig;

class PaymentGatewayConfigSeeder extends Seeder
{
    protected $data = [
        [
            'name'        => 'Paystack',
            'public_key'  => null,
            'secret_key'  => null,
            'sandbox'     => true,
        ],
        [
            'name'        => 'Flutterwave',
            'public_key'  => null,
            'secret_key'  => null,
            'sandbox'     => true,
        ],
        [
            'name'        => 'Autocredit',
            'public_key'  => null,
            'secret_key'  => null,
            'sandbox'     => true,
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->data as $d) {
            PaymentGatewayConfig::create($d);
        }
    }
}
