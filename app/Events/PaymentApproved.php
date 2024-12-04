<?php

namespace App\Events;

use App\Models\User;
use LucasDotVin\Soulbscription\Models\Plan;

class PaymentApproved
{
    public $user;
    public $plan;

    /**
     * Create a new event instance.
     */
    public function __construct(User $user, Plan $plan)
    {
        $this->user = $user;
        $this->plan = $plan;
    }
}
