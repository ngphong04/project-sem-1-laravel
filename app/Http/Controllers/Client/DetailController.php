<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_img;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $slug, $id)
    {
        $categories = Category::where('status', 1)->get();
        $details = Product::where('slug', $slug)->where('id', $id)->first();
        if (!$details) {
            abort(404, 'Sản phẩm không tồn tại');
        }
        
        $images = Product_img::where('product_id', $details->id)->take(4)->get();
        //Lấy sản phẩm liên quan thông qua category_id
        $category = $details->category;
        $relatedProducts = $category->products()->where('id', '!=', $details->id)->take(4)->get();
        return view("front-end.pages.details.details", compact("details", "images", "categories","relatedProducts"));
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
    public function store(Request $request)
    {
        //
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
