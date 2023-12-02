<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(Request $request, $slug = null)
    {
        $categories = Category::where('status', 1)->get();

        $products = null;
        $totalProductsInCategory = [];
        $totalInCategory = 0;
        //Tính tổng số sản phẩm của trong tất cả các danh mục
        foreach ($categories as $category) {
            $totalInCategory += $category->products()->count();
        }
        //Tính tổng số sản phẩm của trong tất cả các danh mục

        foreach ($categories as $category) {
            $totalProductsInCategory[$category->id] = $category->products()->count();
        }

        if ($slug) {
            $category = Category::where('slug', $slug)->first();

            if (!$category) {
                abort(404); // Xử lý trường hợp không tìm thấy danh mục
            }

            // Tính tổng số sản phẩm của danh mục cụ thể
            $totalProductsInCategory[$category->id] = $category->products()->count();


            $products = $category->products()->orderBy('created_at', 'desc')->paginate(12);

        } else {
            // Nếu không có $id, hiển thị tất cả sản phẩm và không cần tính tổng số sản phẩm lại
            $products = Product::paginate(10);
        }
        $currentPage = request()->input('page', 1);
        $startNumber = ($currentPage - 1) * 10 + 1;

        $key = $request->key;
        if ($key) {
            $products = Product::orderBy('created_at', 'desc')->where('name', 'like', '%' . $key . '%')->paginate(10);

            // Nếu có bộ lọc, tính tổng số sản phẩm cho mỗi danh mục lại
            // foreach ($categories as $category) {
            //     $totalProductsInCategory[$category->id] = $category->products()->count();
            // }
        }

        return view("front-end.pages.category.category", compact("products", "startNumber", "categories", "totalProductsInCategory", "totalInCategory"));
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
    public function show()
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
