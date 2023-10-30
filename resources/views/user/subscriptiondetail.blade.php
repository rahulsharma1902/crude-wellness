@extends('front_layout/master')
@section('content')
<div class="container">
    <div class="row">
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
            <h5>#{{ $subscription_detail->subscription_id ?? '' }}</h5>
            


        </div>
    </div>
</div>

@endsection