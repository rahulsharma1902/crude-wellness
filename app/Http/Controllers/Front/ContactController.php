<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\User;
use App\Mail\ContactUsMail;
use Mail;
use Auth;
class ContactController extends Controller
{
    //
    public function index(){
        return view('front.Contact.index');
    }
    public function contactProcc(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        $contact = new ContactUs;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();

        $adminUser = User::where('is_admin', 1)->first();
    
        if ($adminUser) {
            $mailData = [
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ];
            $mail = Mail::to($adminUser->email)->send(new ContactUsMail($mailData)); 

            return redirect()->back()->with('success', 'Your message has been submitted.');
        } else {
            return redirect()->back()->with('error', 'Admin user not found.');
        }

    }
}
