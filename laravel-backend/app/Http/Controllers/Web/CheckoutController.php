<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $sessionId = session()->get('cart_session_id');
        $userId = Auth::id();

        $cartItems = CartItem::with('product')
            ->when($userId, function ($query) use ($userId, $sessionId) {
                $query->where('user_id', $userId)->orWhere('session_id', $sessionId);
            }, function ($query) use ($sessionId) {
                $query->where('session_id', $sessionId);
            })
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $subtotal = $cartItems->sum(function ($item) {
            $price = $item->product->sale_price ?? $item->product->price;
            return $price * $item->quantity;
        });

        $shipping = 0.00; // Free shipping or flat rate
        $total = $subtotal + $shipping;

        return view('checkout', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'shipping_first_name' => 'required|string|max:255',
            'shipping_last_name' => 'required|string|max:255',
            'shipping_email' => 'required|email|max:255',
            'shipping_phone' => 'required|string|max:50',
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|string|max:255',
            'shipping_state' => 'nullable|string|max:255',
            'shipping_zip' => 'nullable|string|max:20',
            'payment_method' => 'required|string',
        ]);

        $sessionId = session()->get('cart_session_id');
        $userId = Auth::id();

        $cartItems = CartItem::with('product')
            ->when($userId, function ($query) use ($userId, $sessionId) {
                $query->where('user_id', $userId)->orWhere('session_id', $sessionId);
            }, function ($query) use ($sessionId) {
                $query->where('session_id', $sessionId);
            })
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        DB::beginTransaction();

        try {
            $totalAmount = 0;
            $orderItemsData = [];

            foreach ($cartItems as $item) {
                $price = $item->product->sale_price ?? $item->product->price;
                $subtotal = $price * $item->quantity;
                $totalAmount += $subtotal;

                $orderItemsData[] = [
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'price' => $price,
                    'quantity' => $item->quantity,
                    'subtotal' => $subtotal,
                ];
            }

            $order = Order::create([
                'user_id' => $userId,
                'order_number' => 'ECO-' . strtoupper(Str::random(8)),
                'total_amount' => $totalAmount,
                'status' => 'pending',
                'payment_method' => $validated['payment_method'],
                'shipping_first_name' => $validated['shipping_first_name'],
                'shipping_last_name' => $validated['shipping_last_name'],
                'shipping_email' => $validated['shipping_email'],
                'shipping_phone' => $validated['shipping_phone'],
                'shipping_address' => $validated['shipping_address'],
                'shipping_city' => $validated['shipping_city'],
                'shipping_state' => $validated['shipping_state'] ?? null,
                'shipping_zip' => $validated['shipping_zip'] ?? null,
            ]);

            foreach ($orderItemsData as $itemData) {
                $order->items()->create($itemData);
            }

            // Clear Cart
            CartItem::when($userId, function ($query) use ($userId, $sessionId) {
                $query->where('user_id', $userId)->orWhere('session_id', $sessionId);
            }, function ($query) use ($sessionId) {
                $query->where('session_id', $sessionId);
            })->delete();

            DB::commit();

            return redirect()->route('order.success', $order->id)->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Failed to place order: ' . $e->getMessage());
        }
    }

    public function success($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('order-details', compact('order'));
    }
}
