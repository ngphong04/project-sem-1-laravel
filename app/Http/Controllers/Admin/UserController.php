<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\User\CreateRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('created_at','DESC')->paginate(10);
        if($key = request()->key){
            $user = User::orderBy('created_at','DESC')->where('fullName','like','%'.$key.'%')->paginate(10);
        }
        return view('admin.pages.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $request->merge(['password'=>Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('user.index')->with('success' ,'Thêm mới thành công một tài khoản!');
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
    public function edit(User $user)
    {
        return view('admin.pages.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('user.index')->with('success' , ' Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success','Xóa thành công một tài khoản!');
    }
}
