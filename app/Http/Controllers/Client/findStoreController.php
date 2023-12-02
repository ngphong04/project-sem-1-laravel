<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class findStoreController extends Controller
{
    public function index(){
        $categories = Category::where('status', 1)->get();
        return view('front-end.pages.map.map',compact('categories'));
    }
}
