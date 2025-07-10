<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function store()
    {

        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();


        foreach ($cartItems as $item) {
            $product = $item->product;

            if ($product->stock < $item->quantity) {
                return back()->with('error', 'Not enough stock for ' . $product->name);
            }

            $product->stock -= $item->quantity;
            $product->save();

            Order::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $item->quantity,
                'price' => $product->price,
            ]);
        }

        // Empty cart
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('index')->with('success', 'Purchase successful!');
    }
}
