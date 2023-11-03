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
            <div class="d-flex justify-content-between">
                <h4>Order details</h4>
                <h6>#{{ $order->order_id ?? '' }}</h6>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product name</th>
                        <th>Order type</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($order->orderDetails as $meta)
                    <tr>
                        <td><img src="{{ asset('productIMG') }}/{{ $meta->productDetails->featured_img ?? '' }}" alt="" width="50%"></td>
                        <td>{{ $meta->order_type ?? '' }}</td>
                        <td>{{ $meta->quantity ?? '' }}</td>
                        <td>${{ number_format($meta->total_price,2) ?? '' }}</td>
                        <td>{{ $meta->PaymentDetail->payment_status ?? '' }}</td>
                        <td>@if($meta->status == 1) confirmed @elseif($meta->status == 0) pending @elseif($meta->status == 2) shipped @elseif($meta->status == 3) delivered @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection