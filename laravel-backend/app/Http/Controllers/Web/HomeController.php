<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->take(8)->get();
        $featuredProducts = Product::with('category')->where('is_featured', true)->take(8)->get();
        $popularProducts = Product::with('category')->take(8)->get();

        return view('home', compact('categories', 'featuredProducts', 'popularProducts'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function faq()
    {
        return view('faq');
    }

    public function blogList()
    {
        return view('blog-list');
    }

    public function blogSingle()
    {
        return view('single-blog');
    }

    public function wishlist()
    {
        $wishlists = Auth::check() ? Wishlist::with('product')->where('user_id', Auth::id())->get() : collect();
        return view('wishlist', compact('wishlists'));
    }

    public function toggleWishlist(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Please login to add to wishlist']);
        }

        $validated = $request->validate(['product_id' => 'required|exists:products,id']);
        $userId = Auth::id();

        $exists = Wishlist::where('user_id', $userId)->where('product_id', $validated['product_id'])->first();

        if ($exists) {
            $exists->delete();
            return response()->json(['success' => true, 'status' => 'removed', 'message' => 'Removed from wishlist']);
        } else {
            Wishlist::create(['user_id' => $userId, 'product_id' => $validated['product_id']]);
            return response()->json(['success' => true, 'status' => 'added', 'message' => 'Added to wishlist']);
        }
    }

    public function userDashboard()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->latest()->take(5)->get();
        return view('dashboard', compact('user', 'orders'));
    }

    public function orderHistory()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->paginate(10);
        return view('order-history', compact('orders'));
    }

    public function orderDetails($id)
    {
        $order = Order::with('items.product')->where('user_id', Auth::id())->findOrFail($id);
        return view('order-details', compact('order'));
    }

    public function accountSetting()
    {
        $user = Auth::user();
        return view('account-setting', compact('user'));
    }
}
