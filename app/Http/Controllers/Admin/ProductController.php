<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product_img;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Admin\Product\CreateProductRequest;
use App\Http\Requests\Admin\Product\EditProductRequest;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $product = Product::orderBy('created_at', 'DESC')->paginate(5);
        if($key = request()->key) {
            $product = Product::orderBy('created_at', 'DESC')->where('name', 'like', '%'.$key.'%')->paginate(5);
        }
        // dd($product[0]->category->name);
        return view('admin.pages.product.index', compact('product'));
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::all();
        return view('admin.pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request) {
        $file_name = '';
        if($request->hasFile('photo')) {
            $file_name = $request->photo->getClientOriginalName();
            $request->photo->storeAs('public/images', $file_name);
            $request->merge(['image' => $file_name]);
        }
        ;
        $file_names = '';
        try {
            $product = Product::create($request->all());
            if($product && $request->hasFile('photos')) {
                foreach($request->photos as $key => $value) {
                    $file_names = $value->getClientOriginalName();
                    $value->storeAs('public/images', $file_names);
                    Product_img::create([
                        'product_id' => $product->id,
                        'image' => $file_names
                    ]);
                }
            }
            return redirect()->route('product.index')->with('success', 'Thêm mới thành công một sản phẩm');
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) {
        $product_imgs = Product_img::where('product_id', $product->id)->paginate(8);
        return view('admin.pages.product.img', compact('product_imgs'));
    }

    public function preview(string $id) {
        $categories = Category::where('status', 1)->get();
        $details = Product::find($id);
        if(!$details) {
            abort(404, 'Sản phẩm không tồn tại');
        }
        $images = Product_img::where('product_id', $details->id)->get();
        return view("admin.pages.product.preview", compact("details", "images", "categories"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) {
        // dd($product->description); 
        $categories = Category::all();
        return view('admin.pages.product.edit', compact('product', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditProductRequest $request, Product $product) {
        $file_name = '';
        if($request->hasFile('photo')) {
            $file_name = $request->photo->getClientOriginalName();
            $request->photo->storeAs('public/images', $file_name);
            $request->merge(['image' => $file_name]);
        }
        $file_names = '';
        $product->update($request->all());
        if($product && $request->hasFile('photos')) {
            $old_imgs = Product_img::where('product_id', $product->id)->get();
            foreach ($old_imgs as $value) {
                $value->delete();
            }
            foreach($request->photos as $value) {
                $file_names = $value->getClientOriginalName();
                $value->storeAs('public/images', $file_names);
                Product_img::create([
                    'product_id' => $product->id,
                    'image' => $file_names
                ]);
            }
        }
        return redirect()->route('product.index')->with('success', 'Cập nhật thành công một sản phẩm');
    }

    public function destroy(Product $product) {
        if($product->order_details->count() != 0) {
            return redirect()->route('product.index')->with('error', 'Không thể xoá vì sản phẩm đang có trong một số đơn hàng');
        } else {
            Product_img::where('product_id', $product->id)->delete();
            $products = $product->delete();
            return redirect()->route('product.index')->with('success', 'Xoá thành công một sản phẩm');
        }
    }
}
