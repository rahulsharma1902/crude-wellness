<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AdminSettingController extends Controller
{
   public function index(){
    return view('admin.Setting.index');
   }
   public function updateprocc(Request $request){

    $request->validate([
        'email' => 'required',
        'name' => 'required',
    ]);
    $admin = User::find(Auth::user()->id);
    $admin->name = $request->name;
    $admin->email = $request->email;
    if($request->password){
        $request->validate([
            'password' => 'required',
            'confirmpassword' => 'required_with:password|same:password'
        ]);
    $admin->password = $request->password;
    }
    $admin->update();
    return redirect()->back()->with(['success'=>'Successfully updated']);
   }

}
