<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private function getSessionId(Request $request)
    {
        if (!session()->has('cart_session_id')) {
            session()->put('cart_session_id', uniqid('cart_'));
        }
        return session()->get('cart_session_id');
    }

    public function index(Request $request)
    {
        $sessionId = $this->getSessionId($request);
        $userId = Auth::id();

        $cartItems = CartItem::with('product')
            ->when($userId, function ($query) use ($userId, $sessionId) {
                $query->where('user_id', $userId)->orWhere('session_id', $sessionId);
            }, function ($query) use ($sessionId) {
                $query->where('session_id', $sessionId);
            })
            ->get();

        $subtotal = $cartItems->sum(function ($item) {
            $price = $item->product->sale_price ?? $item->product->price;
            return $price * $item->quantity;
        });

        return view('cart', compact('cartItems', 'subtotal'));
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $sessionId = $this->getSessionId($request);
        $userId = Auth::id();

        $cartItem = CartItem::where('product_id', $validated['product_id'])
            ->when($userId, function ($query) use ($userId, $sessionId) {
                $query->where('user_id', $userId)->orWhere('session_id', $sessionId);
            }, function ($query) use ($sessionId) {
                $query->where('session_id', $sessionId);
            })
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $validated['quantity'];
            if ($userId && !$cartItem->user_id) {
                $cartItem->user_id = $userId;
            }
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => $userId,
                'session_id' => $sessionId,
                'product_id' => $validated['product_id'],
                'quantity' => $validated['quantity'],
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::findOrFail($id);
        $cartItem->update(['quantity' => $validated['quantity']]);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    public function remove($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }
}
