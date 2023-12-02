<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\Client\forgotPasswordRequest ;
use App\Http\Requests\Client\get_passwordRequest ;
use App\Http\Requests\Client\post_activeRequest ;
use Auth;
use Hash;
use Str;
use Mail;

use App\Http\Requests\Admin\Account\RegisterRequest;

class EmpController extends Controller
{

    public function register()
    {
        $categories = Category::where('status', 1)->get();

        return view('front-end.pages.register.register', compact('categories'));
    }
    public function postRegisterClient(RegisterRequest $request){
        $token = strtoupper(Str::random(10));
        $request->merge(['token' => $token]);
        $request->merge(['password'=>Hash::make($request->password)]);
        if($user = User::create($request->all())){
            Mail::send('emails.active_account', compact('user') , function($email) use($user){
                $email->subject('MyShopping - Xác nhận tài khoản');
                $email->to($user->email,$user->fullName);
            });
            return redirect()->route('client.login')->with('success' ,'Bạn đã đăng ký tài khoản thành công vui lòng xác nhận trong email');
        }
        return redirect()->route('client.login');
    }
    public function login()
    {
        $categories = Category::where('status', 1)->get();

        return view('front-end.pages.login.login', compact('categories'));
    }


    public function postLogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            if(Auth::check()&& Auth::user()->status==0){
                Auth::logout();
                return redirect()->route('client.login')->with('error','Tài khoản chưa kích hoạt , vui lòng click <a href="'.route('client.get_active').'">vào đây để kick hoạt </a>');
            }
            return redirect()->route('client.index');
        }else{
            return redirect()->back()->with('error' ,'Tài khoản hoặc mật khẩu không chính xác');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('client.login');
    }

    public function actived(User $user , $token){
        if($user->token === $token){
            $user->update(['status'=> 1 , 'token'=>null]);
            return redirect()->route('client.login')->with('success' , 'Kích hoạt tài khoản thành công, vui lòng đăng nhập');

        }else{
            return redirect()->route('client.login')->with('error' , 'Mã xác nhận không hợp lệ');
        }
    }

    public function forgotPassword(){
        $categories = Category::where('status', 1)->get();
        return view('front-end.pages.forgot.forgotPassword',compact('categories'));
    }


    public function postForgotPassword(forgotPasswordRequest  $request){

        $token = strtoupper(Str::random(10));
        $request->merge(['token' => $token]);
        $user = User::where('email',$request->email)->first();
        $user->update(['token'=>$token]);

        Mail::send('emails.check_email_forgot', compact('user') , function($email) use($user){
            $email->subject('MyShopping - Lấy lại mật khẩu');
            $email->to($user->email,$user->fullName);
        });
        return redirect()->route('client.login')->with('success' ,'Vui lòng kiểm tra email để thực hiện thay đổi mật khẩu');


    }

    public function get_password(User $user , $token){
        $categories = Category::where('status', 1)->get();
        if($user ->token == $token){
            return view('front-end.pages.get_password.get_password',compact('categories'));
        }
        return abort(404);
    }

    public function post_password(get_passwordRequest $request , User $user , $token){
        $password = $request->password;
        $request->merge(['password'=>Hash::make($password)]);
        $user->update(['password' => $password , 'token'=> null]);
        return redirect()->route('client.login')->with('success' ,'Cập nhật mật khẩu thành công, bạn có thể đăng nhập');
    }

    public function get_active(){
        $categories = Category::where('status', 1)->get();
        return view('front-end.pages.get_active.get_active',compact('categories'));
    }

    public function post_active( post_activeRequest $request){
        $token = strtoupper(Str::random(10));
        $request->merge(['token' => $token]);
        $user = User::where('email',$request->email)->first();
        $user->update(['token'=>$token]);

        Mail::send('emails.active_account', compact('user') , function($email) use($user){
            $email->subject('MyShopping - Xác nhận tài khoản');
            $email->to($user->email,$user->fullName);
        });
        return redirect()->route('client.login')->with('success' ,'Vui lòng kiểm tra email để thực hiện kích hoạt tài khoản');
    }

   

}
