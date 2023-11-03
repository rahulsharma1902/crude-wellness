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
            <h3>My Orders</h3>
            @if($orders->IsNotEmpty())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order id</th>
                        <th>Ordered on</th>
                        <th>Total Amount</th>
                        <th>Order Status</th>
                        <th>view</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>#{{ $order->order_id ?? '' }}</td>
                        <td>{{ $order->created_at ?? '' }}</td>
                        <td>${{ number_format($order->total_price,2) ?? '' }}</td>
                        <td>@if($order->status  == 0) pending @elseif($order->status == 1) confirmed @endif</td>
                        <td><a href="{{ url('account/orders/'.$order->order_id) }}">view</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <h6>Currently ,You don't have any order!</h6>
            
            @endif
        </div>
    </div>
</div>

@endsection