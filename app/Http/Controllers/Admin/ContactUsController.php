<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
class ContactUsController extends Controller
{
    public function index(){
        $messages = ContactUs::all();
        return view('admin.ContactUs.index',compact('messages'));
    }

    public function remove(Request $request, $id) {
        if ($id) {
            $contact = ContactUs::find($id);
            if ($contact) {
                $contact->delete();
                return redirect()->back()->with('success','Contact Us message deleted successfully');
            } else {
                return redirect()->back()->with('error','Contact not found');
            }
        } else {
            return redirect()->back()->with('error','Invalid Id');
        }
    }
}
