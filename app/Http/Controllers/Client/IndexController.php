<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::where('status',1)->take(1)->get();
        // Chỉ lấy các danh mục không bị ẩn
        $categories = Category::where('status', 1)->take(4)->get();
        $products = [];

        foreach ($categories as $category) {
            // Chỉ lấy các sản phẩm của danh mục không bị ẩn
            $categoryProducts = Product::where('category_id', $category->id)->take(3)->get();
            $products[$category->id] = $categoryProducts;
        }
        // dd($banners);

        return view("front-end.pages.index.index", compact('products', 'categories','banners'));
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
