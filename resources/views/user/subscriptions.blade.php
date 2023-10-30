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
        <div class="d-flex justify-content-between">
                <h4>Order details</h4>
                <h6>#{{ $order->order_id ?? '' }}</h6>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <th>Subscription Status</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($subscription as $products)
                    <tr>
                        <td><img src="{{ asset('productIMG') }}/{{ $products->ordermeta->productDetails->featured_img ?? '' }}" alt="" width="50%"></td>
                        <td>{{ $products->ordermeta->productDetails->name ?? '' }}</td>
                        <td>{{ $products->ordermeta->quantity ?? '' }}</td>
                        <td>${{ number_format($products->ordermeta->total_price,2) ?? '' }}</td>
                        <td>@if($products->ordermeta->status == 1) confirmed @elseif($products->ordermeta->status == 0) pending @elseif($products->ordermeta->status == 2) shipped @elseif($products->ordermeta->status == 3) delivered @endif</td>
                        <td><a href="{{ url('account/subscriptions') }}/{{ $products->ordermeta->reccuring_id ?? '' }}">view</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection