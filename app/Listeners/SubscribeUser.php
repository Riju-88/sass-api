<?php

namespace App\Listeners;

use App\Events\PaymentApproved;

class SubscribeUser
{
    public function handle(PaymentApproved $event)
    {
        $subscriber = $event->user;
        $plan = $event->plan;

        // Subscribe the user to the plan
        $subscriber->subscribeTo($plan);
    }
}
