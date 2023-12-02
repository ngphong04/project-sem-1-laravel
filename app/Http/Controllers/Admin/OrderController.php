<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $order = Order::orderBy('id','DESC')->paginate(10);
        if($key = request()->key){
            $order = Order::orderBy('id','DESC')->where('id','like','%'.$key.'%')->paginate(10);
        }
        return view('admin.pages.order.index',compact('order'));
    }

    public function edit(Order $order)
    {
        $order_details = Order_detail::where('order_id', $order->id)->get();
        return view('admin.pages.order.detail', compact('order_details', 'order'));
    }


    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('order.index')->with('success', 'Cập nhật đơn hàng thành công!');
    }

    public function show(string $id)
    {
        
    }

    public function destroy(Order $order)
    {
        if($order->status == 3 || $order->status == 4) {
            Order_detail::where('order_id', $order->id)->delete();
            $order->delete();
            return redirect()->route('order.index')->with('success', 'Đã xoá đơn hàng');
        } else {
            return redirect()->route('order.index')->with('error', 'Đơn hàng chưa được giao, không thể xoá');
        }
    }
}
