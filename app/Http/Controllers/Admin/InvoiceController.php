<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(String $id) {
        $order = Order::find($id);
        $order_details = Order_detail::where('order_id', $order->id)->get();
        return view('admin.pages.invoice.index', compact('order', 'order_details'));
    }
}
