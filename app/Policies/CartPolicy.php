<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartPolicy
{
    /**
     * Determine if user can view the cart
     */
    public function view(User $user, Cart $cart): bool
    {
        // Authenticated user: must own the cart
        if (Auth::check()) {
            return $cart->user_id === $user->id;
        }

        // Guest: must match session
        return $cart->session_id === session()->getId();
    }

    /**
     * Determine if user can update cart item
     */
    public function update(User $user, CartItem $cartItem): bool
    {
        $cart = $cartItem->cart;

        if (Auth::check()) {
            return $cart->user_id === $user->id;
        }

        return $cart->session_id === session()->getId();
    }

    /**
     * Determine if user can delete cart item
     */
    public function delete(User $user, CartItem $cartItem): bool
    {
        return $this->update($user, $cartItem);
    }

    /**
     * Determine if user can clear the cart
     */
    public function clear(User $user, Cart $cart): bool
    {
        if (Auth::check()) {
            return $cart->user_id === $user->id;
        }

        return $cart->session_id === session()->getId();
    }
}