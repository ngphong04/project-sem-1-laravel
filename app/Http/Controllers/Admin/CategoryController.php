<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\Admin\Category\CreateCategoryRequest;
use App\Http\Requests\Admin\Category\EditCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        if ($key = request()->key) {
            $categories = Category::orderBy('id', 'DESC')->where('name', 'like', '%' . $key . '%')->paginate(10);
        }
        return view('admin.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $request)
    {
        $parent = null;
        if ($request->parent_id) {
            $parent = Category::where('id', $request->parent_id)->firstOrFail();
            $request->merge(['level'=>$parent->level + 1]);
        } else {
            $request->merge(['level'=> 0]);
        }
        Category::create($request->all());
        return redirect()->route('category.index')->with('success', 'Thêm mới thành công một danh mục!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $product = Product::where('category_id', $category->id)->get();
        if ($key = request()->key) {
            $product = Product::where('category_id', $category->id)->where('name', 'like', '%'.$key.'%')->get();
        }
        return view('admin.pages.category.list', compact('product', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.pages.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditCategoryRequest $request, Category $category)
    {
        $parent = null;
        if ($request->parent_id) {
            $parent = Category::where('id', $request->parent_id)->firstOrFail();
            $request->merge(['level'=>$parent->level + 1]);
        } else {
            $request->merge(['level'=> 0]);
        }
        $category->update($request->all());
        return redirect()->route('category.index')->with('success', ' Cập nhật thành công!');
    }

    public function destroy(Category $category)
    {
        $trash = Category::withTrashed()->where('parent_id', $category->id)->count();
        if ($category->products->count() != 0) {
            return redirect()->back()->with('product', 'Không thể xoá danh mục vì danh mục này có chứa sản phẩm!');
        } elseif ($category->child->count() != 0) {
            return redirect()->back()->with('category', 'Không thể xoá danh mục vì danh mục này có chứa danh mục con!');
        } elseif ($trash != 0) {
            return redirect()->back()->with('trash', 'Không thể xoá danh mục vì danh mục này có chứa danh mục con trong thùng rác!');
        } else {
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Xóa thành công danh mục!');
        }
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->paginate(10);
        return view('admin.pages.category.trash', compact('categories'));
    }

    public function restore($id)
    {
        Category::withTrashed()->where('id', $id)->restore();
        return redirect()->route('category.index')->with('success', 'Khôi phục thành công danh mục!');
    }

    public function forceDelete($id)
    {
        Category::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('category.trash');
    }

    public function deleteAll() 
    {
        // $trash = Category::onlyTrashed()->get();
        // // dd($trash);
        // dd($trash[0]->child->count());
        // $item = 0;
        // foreach ($trash as $key => $value) {
        //     $item = $item + $value->child->count();
        //     // dd($value->child->count());
        // }
        // dd($item);
        Category::onlyTrashed()->forceDelete();
        return redirect()->route('category.index');
    }

    public function restoreAll() 
    {
        $trashed = Category::onlyTrashed();
        $trashed->restore();
        return redirect()->route('category.index');
    }
}
