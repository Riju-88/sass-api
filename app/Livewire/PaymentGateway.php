<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class PaymentGateway extends Component
{
    public $selectedPlan;

    public function mount()
    {
        // Check if form state exists in session
        if (session()->has('selected_plan')) {
            $this->selectedPlan = session('selected_plan');
        } else {
            // Abort with a 403 error or redirect back
            abort(403, 'Selected plan not found.');
        }
    }

    public function render()
    {
        return view('livewire.payment-gateway', ['selected_plan' => $this->selectedPlan]);
    }
}
