<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\Evaluate;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EvaluatePolicy
{


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Customer $customer, Evaluate $evaluate): bool
    {
        return $customer->id === $evaluate->customer_id;
    }

}
