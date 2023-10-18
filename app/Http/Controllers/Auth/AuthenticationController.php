<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Mail\UserRegisterMail;
use Mail;

class AuthenticationController extends Controller
{
    public function index(){
        
        return view('authentication.login');
    }
    public function loginProcc(Request $request){
    

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        if(Auth::attempt(['email'=>$request->username,'password'=>$request->password])){
            // echo '<pre>';
            // print_r(Auth::user());
            // echo '</pre>';
                if(Auth::user()->is_admin == 1){
                    return redirect('/admin-dashboard')->with('success','Successfully loggedin! Welcome Come Admin');
                }elseif(Auth::user()->is_admin == 0){
                    return redirect('/account')->with('success','Successfully loggedin');
                }else{
                    Auth::logout();
                    return redirect()->back()->with('error','failed! Something went wrong');
                }
        }else{
            return redirect()->back()->with('error','failed to login');
        }
    }
    public function register(){
        return view('authentication.register');
    }
    public function registerProcc(Request $request){
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
        ]);
        $password = Hash::make($request->password);

        $user = User::create(['name'=>$request->name,'email'=>$request->email,'password'=>$password]);
        $mailData = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        $mail = Mail::to($request['email'])->send(new UserRegisterMail($mailData)); 
        
        return redirect()->back()->with('success','Your account is created successfully');
    }
    public function forgetPassword(){
        return view('authentication.forgottenpassword');
    }
    public function forgetPasswordSubmit(Request $request){
        $request->validate([
            'username' => 'required'
        ]);
        $user = User::where([['email',$request->username],['is_admin',0]])->first();
        if($user){
            $secreat_key = base64_encode($request->username);
           $url = url('');
        }else{
            return redirect()->back()->with('error','Failed! this username is not found in our database');
        }
    }
    public function newpassword($secret_key = null){
        echo $secret_key;
    }
    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success','successfully logged out');
    }
}
