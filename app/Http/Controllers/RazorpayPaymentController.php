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
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (!empty($input['razorpay_payment_id'])) {
            try {
                $response = $api
                    ->payment
                    ->fetch($input['razorpay_payment_id'])
                    ->capture(['amount' => $payment['amount']]);
            } catch (Exception $e) {
                return redirect()
                    ->back()
                    ->with('error', $e->getMessage());
            }
        }

        return redirect()
            ->back()
            ->with('success', 'Payment successful');
    }
}
