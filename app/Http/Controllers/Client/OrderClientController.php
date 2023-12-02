<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\User;
class OrderClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $order = Order::orderBy('id','DESC')->get();
        return view('front-end.pages.order.order',compact('categories','order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $categories = Category::where('status', 1)->get();
        $order = Order::orderBy('id','DESC')->get();
        $order_details = Order_detail::where('order_id', $order[0]['id'])->get();
        $total_price = $order[0]['total_price'];
        return view('front-end.pages.order.detail', compact('categories','order_details', 'order','total_price'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {

        $id = $request->input('id');
        $order = Order::find($id);
        if ($order) {
        $order->update(['status' => 4]);
        return redirect()->route('orderClient.index')->with('success', 'Cập nhật đơn hàng thành công!');
        }else{
            return redirect()->back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        
    }

    
}
