<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

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
                    return redirect('/')->with('success','Successfully loggedin');
                }else{
                    Auth::logout();
                    return redirect()->back()->with('error','failed! Something went wrong');
                }
        }else{
            return redirect()->back()->with('error','failed to login');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success','successfully logged out');
    }
}
