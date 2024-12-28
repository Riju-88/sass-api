<?php

namespace App\Livewire;

use App\Models\Plandetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use LucasDotVin\Soulbscription\Models\Plan;
use LucasDotVin\Soulbscription\Models\Subscription;

class Plans extends Component
{
    public $planId;
    public $plansWithDetails;

    public function mount()
    {
        // Get the currently authenticated user
        $user = auth('sanctum')->user();

        // Fetch all plans with their corresponding details
        $this->plansWithDetails = Plan::all()->map(function ($plan) {
            $detail = PlanDetail::where('plan_id', $plan->id)->first();
            // dd($detail);
            return (object) [
                'id' => $plan->id,
                'name' => $plan->name,
                'description' => $detail->description ?? 'No description available.',
                'price' => $detail->price ?? 'Price not available',
            ];
        });
    }

    public function assignPlan($planId)
    {
        // dd($planId);
        // Get the currently authenticated user
        $user = Auth::user();

        // Find the selected plan
        $plan = Plan::find($planId);
        // dd($plan);
        // Check if the plan exists
        if (!$plan) {
            session()->flash('error', 'Plan not found');
            return;
        }

        // Fetch the plan details
        $planDetail = PlanDetail::where('plan_id', $plan->id)->first();

        // Check if plan details exist
        if (!$planDetail) {
            session()->flash('error', 'Plan details not found.');
            return;
        }

        // First, check if the user has an active subscription
        $activeSubscription = Subscription::where('subscriber_type', get_class($user))
            ->where('subscriber_id', $user->id)
            ->whereNull('canceled_at')  // Ensure the subscription is not canceled
            ->where(function ($query) {
                $query
                    ->whereNull('expired_at')  // Either not expired
                    ->orWhere('expired_at', '>', now());  // Or not expired yet
            })
            ->first();

        // Handle the case when the user already has an active subscription
        if ($activeSubscription) {
            // If the user is trying to switch to the same plan they already have
            if ($activeSubscription->plan_id === $plan->id) {
                session()->flash('error', 'You are already subscribed to this plan.');
                return;
            }

            // If the plan has a price greater than 0 (for upgrades or changes)
            if ($planDetail->price > 0) {
                session()->put('selected_plan', [
                    'id' => $plan->id,
                    'name' => $plan->name,
                    'price' => $planDetail->price,
                ]);

                // Redirect to the payment gateway
                return redirect()->route('payment-gateway');
            } else {
                // For free plans, we simply upgrade or downgrade the user
                // This might involve changing features, permissions, etc.
                // Handle any additional logic required for downgrading, if any
                $user->subscribeTo($plan);
                session()->flash('success', 'You have successfully switched to the free plan.');
            }
        } else {
            // Case when the user doesn't have an active subscription
            // If the selected plan has a price greater than 0 (new subscription or upgrade)
            if ($planDetail->price > 0) {
                session()->put('selected_plan', [
                    'id' => $plan->id,
                    'name' => $plan->name,
                    'price' => $planDetail->price,
                ]);

                // Redirect to the payment gateway
                return redirect()->route('payment-gateway');
            } else {
                // If the price is 0 and no active subscription, subscribe the user to the selected plan
                $user->subscribeTo($plan);

                session()->flash('success', 'You have been successfully subscribed to the plan!');
            }
        }
    }

    public function render()
    {
        return view('livewire.plans', ['plans' => $this->plansWithDetails]);
    }
}
