<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Helper\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Cart $cart)
    {
        $categories = Category::where('status', 1)->get();

        return view("front-end.pages.cart.cart", compact('cart', 'categories'));
    }

    public function add(Request $request, Cart $cart)
    {
        $product = Product::find($request->id);
        $quantity = $request->quantity;
        $size = $request->size;
        $cart->add($product, $quantity, $size);
        if (!isset($request->size)) {
            return redirect()->back()->with('error', 'Bạn phải chọn size trước khi thêm vào giỏ hàng');
        }
        return redirect()->route('client.cart');
    }

    public function update(Cart $cart, $id)
    {
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id, $quantity);
        return redirect()->back();
    }

    public function remove(Cart $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back();
    }

    public function clear(Cart $cart)
    {
        $cart->clear();
        return redirect()->back();
    }
    

}
