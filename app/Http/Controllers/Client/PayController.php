<?php

namespace App\Http\Controllers\Client;

use App\Helper\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\PayRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Str;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Cart $cart)
    {
        $categories = Category::where('status', 1)->get();

        return view("front-end.pages.pay.pay", compact("categories", "cart"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PayRequest $request, Cart $cart)
    {
        $totalPrice = $cart->getTotalPrice();
        $shippingFee = 20000;
        $totalPriceWithShipping = $totalPrice + $shippingFee;
        $name = $request->input('name');
        if (
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'code' => strtoupper(str::random(10)),
                'name' => $name,
                'total_price' => $totalPriceWithShipping,
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'status' => '0',
                'note' => $request->input('note'),
            ])

        ) {
            // dd($order);
            $order_id = $order->id;
            foreach ($cart->list() as $product_id => $item) {
                $quantity = $item['quantity'];
                $total_price = $item['price'];
                $size = $item['size'];
                $Order_detail = Order_detail::create([
                    'order_id' => $order_id,
                    'product_id' => $product_id,
                    'total_price' => $total_price,
                    'quantity' => $quantity,
                    'size' => $size,
                ]);
                if (!$Order_detail) {
                    dd($Order_detail);
                }
            }
            session(['cart' => '']);
            return redirect()->route('client.index')->with('Correct', 'Bạn đã đặt hàng thành công.')->with('flash_expire', now()->addMinutes(1));
        } else {
            dd($cart);
        }

        ;



    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
