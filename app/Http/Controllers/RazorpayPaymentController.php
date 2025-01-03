<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use LucasDotVin\Soulbscription\Models\Plan;
use LucasDotVin\Soulbscription\Models\Subscription;
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
        $selectedPlan = '';
        $planMsg = '';
        $paymentMsg = '';
        // Check if form state exists in session
        if (session()->has('selected_plan')) {
            $selectedPlan = session('selected_plan');
        } else {
            // Abort with a 403 error or redirect back
            abort(403, 'Selected plan not found.');
        }
        $plan = Plan::find($selectedPlan['id']);
        $user = auth('sanctum')->user();
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

                if ($response['status'] == 'captured') {
                    $paymentMsg = 'Payment successful';
                    // DB::transaction(function () {

                    // });

                    // check active subscription
                    $activeSubscription = Subscription::where('subscriber_type', get_class($user))
                        ->where('subscriber_id', $user->id)
                        ->whereNull('canceled_at')  // Ensure the subscription is not canceled
                        ->where(function ($query) {
                            $query
                                ->whereNull('expired_at')  // Either not expired
                                ->orWhere('expired_at', '>', now());  // Or not expired yet
                        })
                        ->first();

                    if (!$activeSubscription) {
                        // subscribe to plan
                        $user->subscribeTo($plan);

                        // clear session
                        session()->forget('selected_plan');
                        $planMsg = 'Successfully subscribed to ' . $plan->name;

                        return redirect()->route('home')->with('success', $paymentMsg . ' and ' . $planMsg);
                    }
                    $user->switchTo($plan);
                    // clear session
                    session()->forget('selected_plan');
                    $planMsg = 'Successfully subscribed to ' . $plan->name;

                    // Session::put('success', ('Payment Successful'));
                    // return redirect(route('home'));
                    return redirect()->route('home')->with('success', $paymentMsg . ' and ' . $planMsg);
                }
            } catch (Exception $e) {
                \Log::error('Razorpay API Error: ' . $e->getMessage());
                Session::put('error', 'An error occurred while processing the payment. Please try again later.');
                // return redirect(route('home'));
                return redirect()
                    ->back()
                    ->with('error', 'An error occurred while processing the payment. Please try again later.');
            }
        }
    }
}
