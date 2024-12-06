<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Razorpay\Api\Api;
use Exception;

class RazorpayPaymentController extends Controller
{
    //

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(): View
    {
        return view('razorpay');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();
         // Verify CSRF token
         if (!Session::token() == $input['_token']) {
            Session::put('error', 'CSRF token mismatch');
            return redirect()->back();
        }
        $api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
        // dd($input);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $payment = Payment::create([
                    'r_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => $response['email'],
                    'amount' => $response['amount'] / 100,
                    'json_response' => json_encode((array) $response)
                ]);

                // if ($response['status'] == 'captured') {
                //     DB::transaction(function () {
                       
                //     });
                // }
            } catch (Exception $e) {
                \Log::error('Razorpay API Error: ' . $e->getMessage());
                Session::put('error', 'An error occurred while processing the payment. Please try again later.');
                // return redirect(route('home'));
                return redirect()
                    ->back()
                    ->with('error', 'An error occurred while processing the payment. Please try again later.');
            }
        }
        // Session::put('success', ('Payment Successful'));
        // return redirect(route('home'));
        return redirect()
            ->back()
            ->with('success', 'Payment successful');
    }
}
