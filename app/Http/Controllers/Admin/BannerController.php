<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\Admin\Banner\CreateRequest;
use App\Http\Requests\Admin\Banner\EditRequest;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::orderBy('created_at','DESC')->paginate(5);
        if($key = request()->key){
            $banner = Banner::orderBy('created_at','DESC')->where('name','like','%'.$key.'%')->paginate(5);
        }
        return view('admin.pages.banner.index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $file = $request->photo;
        $file_name  = $file -> getClientOriginalName();
        $file ->storeAs('public/images',$file_name);
        $request->merge(['banner'=>$file_name]);
        Banner::create($request->all());
        return redirect()->route('banner.index')->with('success' ,'Thêm mới thành công banner!');
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
    public function edit(Banner $banner)
    {
        return view('admin.pages.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditRequest $request, Banner $banner)
    {
        if($request->hasFile('photo')){
            $file = $request->photo;
            $file_name = $file->getClientOriginalName();
            $file ->storeAs('public/images',$file_name);
        }else{
            $file_name = $banner->banner;
        }
        $request->merge(['banner'=>$file_name]);
        $banner->update($request->all());
        return redirect()->route('banner.index')->with('success' , 'Cập nhật thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('banner.index')->with('success' ,'Xóa thành công banner');
    }
}
