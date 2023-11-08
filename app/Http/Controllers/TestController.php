<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TestNotification;
use App\Models\User;
use Notification;

class TestController extends Controller
{
    public function index(){

        return view('test');
    }
}
