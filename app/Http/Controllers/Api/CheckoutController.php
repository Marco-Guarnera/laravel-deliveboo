<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key'),
        ]);
    }

    // Ottieni il token del client
    public function generateToken()
    {
        $token = $this->gateway->clientToken()->generate();
        return response()->json(['clientToken' => $token]);
    }

    // Esegui il pagamento
    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'payment_method_nonce' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $result = $this->gateway->transaction()->sale([
            'amount' => $validated['amount'],
            'paymentMethodNonce' => $validated['payment_method_nonce'],
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success) {
            return response()->json([
                'success' => true,
                'transaction_id' => $result->transaction->id,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => $result->message,
            ], 500);
        }
    }
}
