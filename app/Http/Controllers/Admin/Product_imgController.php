<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product_img;
use Illuminate\Http\Request;

class Product_imgController extends Controller
{
    public function delete(String $id){
        Product_img::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Đã xoá 1 ảnh');
    }
}
