<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Auth;
use App\Http\Requests\Client\ProfileRequest;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $userId = Auth::id();
        $user  = User::find($userId);
        return view('front-end.pages.profile.profile',compact('categories','user'));
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
    public function edit(User $user)
    {
        $categories = Category::where('status', 1)->get();
        $userId = Auth::id();
        $user  = User::find($userId);
        return view('front-end.pages.update_profile.update_profile',compact('categories','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, User $user)
    {
        $userId = Auth::id();
        $user  = User::find($userId);
        if($request->hasFile('photo')){
            $file = $request->photo;
            $file_name = $file->getClientOriginalName();
            $file ->storeAs('public/images',$file_name);
        }else{
            $file_name = $user->image;
        }
        $request->merge(['image'=>$file_name]);
        $user->update($request->all());
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
