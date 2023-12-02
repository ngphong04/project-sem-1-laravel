<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Account\RegisterRequest;
use App\Models\User;
use Auth;
use Hash;
class AccountController extends Controller
{

    public function register(){
        return view('admin.pages.account.register');
    }
    public function postRegister(RegisterRequest $request){
        $request->merge(['password'=>Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('account.login');
    }

    public function login(){
        return view('admin.pages.account.login');
    }

    public function postLogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password,'role'=>1])){
            return redirect()->route('index.index');
        }else{
            return redirect()->back()->with('error' ,'Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }
}
