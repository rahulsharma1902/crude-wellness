<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TestNotification;
use App\Models\User;
use Notification;

class TestController extends Controller
{
    public function index(){
        $userSchema = User::first();
        $offerData = [
            'name' => 'BOGO',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];
  
  
     $notification = Notification::send($userSchema, new TestNotification($offerData));
     echo '<pre>';
     print_r($notification);
     echo '</pre>';

    }
}
