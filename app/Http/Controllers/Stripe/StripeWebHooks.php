<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\PaymentConfirmation;
use Stripe\Stripe;
use Stripe\Webhook;
use App\Models\OrderMeta;
use App\Models\PaymentCollection;
use App\Models\Order;
use App\Models\User;


class StripeWebHooks extends Controller
{
    public function index(){
        
        
        $end_point_secret = env('STRIPE_WEBHOOK_SECRET');
        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        try {
        
        $event = \Stripe\Webhook::constructEvent($payload, $sig_header, $end_point_secret);
        $price_id = $event->data->object->lines->data[0]->plan->id;
        $paymentIntent = $event->data->object->payment_intent;
        $payment_amount = $event->data->object->lines->data[0]->amount;
        $amount = (int)($payment_amount / 100);
        $invoiceurl = $event->data->object->hosted_invoice_url;
        $invoicepdf = $event->data->object->invoice_pdf;
        $orderMeta = OrderMeta::where('stripe_price_id',$price_id)->first();
        $paymentcollection = PaymentCollection::where('payment_intent',$paymentIntent)->first();
        if($paymentcollection){
            $paymentcollection->order_id = $orderMeta->order_id;
            $paymentcollection->inovice_id = $event->data->object->id;
            $paymentcollection->payment_intent = $paymentIntent;
            $paymentcollection->payment_amount = $amount;
            $paymentcollection->invoice_url = $invoiceurl;
            $paymentcollection->invoice_pdf = $invoicepdf;
            $paymentcollection->payment_status = 'succeeded';
            $paymentcollection->update();
        }else{
            $paymentcollection = new PaymentCollection;
            $paymentcollection->order_id = $orderMeta->order_id;
            $paymentcollection->inovice_id = $event->data->object->id;
            $paymentcollection->payment_intent = $paymentIntent;
            $paymentcollection->payment_amount = $amount;
            $paymentcollection->invoice_url = $invoiceurl;
            $paymentcollection->invoice_pdf = $invoicepdf;
            $paymentcollection->payment_status = 'succeeded';
            $paymentcollection->save();
        }
        $order = Order::find($orderMeta->order_id);
        $status = 1;
            foreach($order->payment as $payment){
                if($payment->status == 'incomplete'){
                    $status = 0;
                }
            }
            $order->status = $status;
            $order->update();
        $user = User::find($order->customer_id);
            $mailData = [
                'name' => $user->name,
                'invoice_url' => $paymentcollection->invoice_url,
                'invoice_pdf' => $paymentcollection->invoice_pdf,
                'payment_status' => $paymentcollection->payment_status,
            ]; 
            $mail = Mail::to($user->email)->send(new PaymentConfirmation($mailData)); 
        
            return response('success',200);

    } catch (\Stripe\Exception\SignatureVerificationException $e) {
        return $e->getMessage();
    }

    }
}
