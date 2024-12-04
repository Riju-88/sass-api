<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use LucasDotVin\Soulbscription\Models\Plan;

class Plans extends Component
{
    public $planId;
    public $plans;

    public function mount()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Fetch all available plans
        $this->plans = Plan::all();
    }

    public function assignPlan()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Find the selected plan
        $plan = Plan::find($this->planId);

        // Check if the plan exists
        if (!$plan) {
            session()->flash('error', 'Plan not found');
            return;
        }

        // Assign the plan to the user (assuming a subscribeTo method exists in the User model)
        $user->subscribeTo($plan);

        session()->flash('success', 'Plan successfully assigned!');
    }

    public function render()
    {
        return view('livewire.plans');
    }
}
