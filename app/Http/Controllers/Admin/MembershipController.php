<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
   public function index(){
        return view('admin.membership.index');
   }
   public function AddMembership(){

        return view('admin.membership.addmembership');
   }
}
