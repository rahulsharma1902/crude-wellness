@extends('front_layout/master')
@section('content')
<div class="container">
    <div class="row outer_row">
        <div class="col-lg-3 py-4">
            <div class="p-1">
                <a href="{{ url('account/orders') }}" class="main-btn" style="width:100%;">Orders</a>
            </div>
            <div class="p-1">
                <a href="{{ url('account/subscriptions') }}" class="main-btn" style="width:100%;">Subscriptions</a>
            </div>
            <div class="p-1">
                <a href="{{ url('logout') }}" class="main-btn" style="width:100%;">logout</a>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="d-flex" style="justify-content: space-around;">
            <h5 >#{{ $subscription_detail->subscription_id ?? '' }}</h5>
            @if($subscription_detail->ordermeta->userSubscription->subscription_status != 0)
                <div class="">
                    
                    <a href="{{ url('account/subscription-cancel/' . ($subscription_detail->subscription_id ?? '')) }}" class='btn btn-danger {{ $subscription_detail->ordermeta->userSubscription->subscription_status == "active" ? "" : "d-none" }}'>Cancel</a>
                </div>
                <div class="">
                <a href="{{ url('account/' . ($subscription_detail->ordermeta->userSubscription->subscription_status == 'active' ? 'subscription-pause' : 'subscription-continue') . ($subscription_detail->subscription_id ? '/' . $subscription_detail->subscription_id : '')) }}" class='btn btn-warning'>
                    {{ $subscription_detail->ordermeta->userSubscription->subscription_status == 'active' ? "Pause" : "Continue" }}
                </a>
                </div>
            @endif
            </div>
            <div class="userInformation">
                <h4 class="text_heading">User Information</h4>
                <div class="row">
                    <div class="col">First Name</div>
                    <div class="col">{{ $subscription_detail->ordermeta->orderdata->user->address->first_name ?? '' }}</div>
                </div>
                <div class="row">
                    <div class="col">Last Name</div>
                    <div class="col">{{ $subscription_detail->ordermeta->orderdata->user->address->last_name ?? '' }}</div>
                </div>
                <div class="row">
                    <div class="col">Email Address</div>
                    <div class="col">{{ $subscription_detail->ordermeta->orderdata->user->email ?? '' }}</div>
                </div>
                <div class="row">
                    <div class="col">Phone Number</div>
                    <div class="col">{{ $subscription_detail->ordermeta->orderdata->user->address->mobiles ?? '' }}</div>
                </div>
            </div>
            <div class="productDetails">
                <h4 class="text_heading">Product Details</h4>
                <div class="row">
                    <div class="col">Product Image</div>
                    <div class="col" style="height: 5rem;"> <img style="height:100%;" class="img-thumbnail" src="{{ asset('productIMG') ?? '' }}/{{ $subscription_detail->ordermeta->productDetails->featured_img ?? '' }}" alt=""></div>
                </div>
                <div class="row">
                    <div class="col">Product Name</div>
                    <div class="col">{{ $subscription_detail->ordermeta->productDetails->name ?? '' }}</div>
                </div>
                <div class="row">
                    <div class="col">Strength</div>
                    <div class="col">{{ $subscription_detail->ordermeta->variations->strength ?? '' }} MG</div>
                </div>
                <div class="row">
                    <div class="col">Price</div>
                    <div class="col">${{ $subscription_detail->ordermeta->price ?? '' }}</div>
                </div>
                <div class="row">
                    <div class="col">Quantity</div>
                    <div class="col">{{ $subscription_detail->ordermeta->quantity ?? '' }}</div>
                </div>
            </div>
            <div class="subscriptionInformation">
                <h4 class="text_heading">Subscription Info</h4>
                <div class="row">
                    <div class="col">Started At</div>
                    <div class="col">{{ \Carbon\Carbon::parse($subscription_detail->ordermeta->userSubscription->started_on)->format('F j, Y, g:i A') }}</div>
                </div>
                <div class="row">
                    <div class="col">End At</div>
                    <div class="col">{{ \Carbon\Carbon::parse($subscription_detail->ordermeta->userSubscription->end_on)->format('F j, Y, g:i A') }}</div>
                </div>
                <div class="row">
                    <div class="col">Status</div>
                    <div class="col">{{ $subscription_detail->ordermeta->userSubscription->subscription_status == 0 ? "Pending" : ($subscription_detail->ordermeta->userSubscription->subscription_status == "active" ? "Active" : ($subscription_detail->ordermeta->userSubscription->subscription_status == 2 ? "Pause" : "Cancelled")) }}</div>
                </div>
                <div class="row">
                    <div class="col">Delivery Status</div>
                    <div class="col">@if($subscription_detail->ordermeta->status == 0) Pending @elseif($subscription_detail->ordermeta->status == 1) Confirmed @elseif($subscription_detail->ordermeta->status == 2) Shipped @elseif($subscription_detail->ordermeta->status == 3) Delivered @endif</div>
                </div>
            </div>
            <div class="subscriptionInformation">
                <h4 class="text_heading">Previous payments</h4>
                
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Event Started</th>
                            <th>Event End</th>
                            <th>Status</th>
                            <th>Delivery Status</th>
                        </tr>
                    </thead>
                    <?php $count = 1; ?>
                    @foreach($payments as $payment)
                    <tbody>
                        <tr class="text-center">
                            <td>{{ $count++ }}.</td>
                            <td>{{ $payment->period_start ?? '' }}</td>
                            <td>{{ $payment->period_end ?? '' }}</td>
                            <td>{{ $payment->payment_status ?? '' }}</td>
                            <td>@if($payment->delivery_status == 0) Pending @elseif($payment->delivery_status == 1) Confirmed @elseif($payment->delivery_status == 2) Shipped @elseif($payment->delivery_status == 3) Delivered @endif</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
          
            </div>
        </div>
    </div>
</div>

@endsection