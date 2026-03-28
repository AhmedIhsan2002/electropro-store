<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    /**
     * Determine if user can view the order
     */
    public function view(User $user, Order $order): bool
    {
        // User can only view their own orders
        return $order->user_id === $user->id;
    }

    /**
     * Determine if user can update the order
     */
    public function update(User $user, Order $order): bool
    {
        // Only pending orders can be updated
        return $order->user_id === $user->id && $order->status === 'pending';
    }
}