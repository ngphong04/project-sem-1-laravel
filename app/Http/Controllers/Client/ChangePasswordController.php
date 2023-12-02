<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Auth;
use Hash;
use Str;
use Mail;
use App\Http\Requests\Client\changePasswordRequest; 
use App\Http\Requests\Client\get_passwordRequest ;
class ChangePasswordController extends Controller
{
    public function change_pass(){
        $userId = Auth::id();
        $user  = User::find($userId);
        $categories = Category::where('status', 1)->get();
        return view('front-end.pages.change_password.change_password',compact('categories','user'));
    }


    public function postchange_pass(changePasswordRequest $request){

        $token = strtoupper(Str::random(10));
        $request->merge(['token' => $token]);
        $user = User::where('email',$request->email)->first();
        $user->update(['token'=>$token]);

        Mail::send('emails.change_pass', compact('user') , function($email) use($user){
            $email->subject('MyShopping - Thay đổi mật khẩu');
            $email->to($user->email,$user->fullName);
        });
        return redirect()->back()->with('success' ,'Vui lòng kiểm tra email để thực hiện thay đổi mật khẩu');


    }

    public function get_change_password(User $user , $token){
        $categories = Category::where('status', 1)->get();
        if($user ->token == $token){
            return view('front-end.pages.get_password.get_password',compact('categories'));
        }
        return abort(404);
    }

    public function post_change_password(get_passwordRequest $request , User $user , $token){
        $password = $request->password;
        $request->merge(['password'=>Hash::make($password)]);
        $user->update(['password' => $password , 'token'=> null]);
        return redirect()->route('profile.index')->with('success' ,'Thay đổi mật khẩu thành công');
    }

}
