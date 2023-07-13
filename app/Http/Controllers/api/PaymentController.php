<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        // Set your Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Retrieve the payment details from the request
        $cardNumber = $request->input('card_number');
        $cvc = $request->input('cvc');
        $expMonth = $request->input('exp_month');
        $expYear = $request->input('exp_year');
        $amount = $request->input('amount');

        // Create a charge using Stripe API
        try {
            $charge = Charge::create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => [
                    'object' => 'card',
                    'number' => $cardNumber,
                    'exp_month' => $expMonth,
                    'exp_year' => $expYear,
                    'cvc' => $cvc,
                ],
            ]);

            // Payment successful, process further if needed
            return response()->json(['success' => true, 'message' => 'Payment successful']);
        } catch (\Exception $e) {
            // Payment failed, handle the error
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
