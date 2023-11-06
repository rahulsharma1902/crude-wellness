@extends('admin_layout/master')
@section('content')
            <div class="container">
                <div class="d-flex justify-content-end">
                    {{ Breadcrumbs::render('orders-detail',$order->order_id ?? '') }}
                </div>
            <div class="nk-tnx-details">
                                            <div class="nk-block-between flex-wrap g-3">
                                                <div class="nk-tnx-type">
                                                    <div class="nk-tnx-type-icon bg-{{ $order->status == 0 ? 'warning' : 'success' }} text-white">
                                                        <em class="icon ni ni-arrow-up-right"></em>
                                                    </div>
                                                    <div class="nk-tnx-type-text">
                                                        <h5 class="title status{{ $order->id ?? '' }}">{{ $order->status == 0 ? "Pending" : ($order->status == 1 ? "Confirmed" : ($order->status == 2 ? "Shipped" : "Delivered")) }}</h5>
                                                        <span class="sub-text mt-n1">{{ $order->created_at ?? '' }}</span>
                                                    </div>
                                                </div>
                                                <ul class="align-center flex-wrap gx-3">
                                                    <li>
                                                        <span id="order-status" order-id ="{{ $order->id ?? '' }}" value="{{ $order->status ?? '' }}" class="badge order-status badge-sm badge-success text-{{ $order->status == 0 ? 'warning' : 'success' }} status{{ $order->id ?? '' }}">{{ $order->status == 0 ? "Pending" : ($order->status == 1 ? "Confirmed" : ($order->status == 2 ? "Shipped" : "Delivered")) }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="nk-modal-head mt-sm-5 mt-4 mb-4">
                                                <h5 class="title">Transaction Info</h5>
                                            </div>
                                            <div class="row gy-3">
                                                <div class="col-lg-6">
                                                    <span class="sub-text">Order ID</span>
                                                    <span class="caption-text">{{ $order->order_id ?? '' }}</span>
                                                </div>
                                                <!-- <div class="col-lg-6">
                                                    <span class="sub-text">Reference ID</span>
                                                    <span class="caption-text text-break">NIY9TB2JG73YWLXPYM2U8HR</span>
                                                </div> -->
                                                <!-- <div class="col-lg-6">
                                                    <span class="sub-text">Transaction Fee</span>
                                                    <span class="caption-text">0.000002 BTC</span>
                                                </div> -->
                                                <div class="col-lg-6">
                                                    <span class="sub-text">Amount</span>
                                                    <span class="caption-text">${{ number_format($order->price ?? 0,2) }}</span>
                                                </div>
                                            </div><!-- .row -->
                                            <div class="nk-modal-head mt-sm-5 mt-4 mb-4">
                                                <h5 class="title">User Details</h5>
                                            </div>
                                            <div class="row gy-3">
                                                <div class="col-lg-6">
                                                    <span class="sub-text">Name</span>
                                                    <span class="caption-text">{{ $order->user->name ?? '' }}</span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <span class="sub-text">Email</span>
                                                    <span class="caption-text align-center">{{ $order->user->email ?? '' }} </span>
                                                        <!-- <span class="badge bg-primary ms-2 text-white">{{ $order->user->email ?? '' }}</span> -->
                                                </div>
                                                <div class="col-lg-12">
                                                    <span class="sub-text">Address</span>
                                                    <span class="caption-text text-break">
                                                        {{ $order->user->address->address }}, 
                                                        {{ $order->user->address->state }}, 
                                                        {{ $order->user->address->city }}, 
                                                        ({{ $order->user->address->region }})  
                                                        {{ $order->user->address->zipcodes }}
                                                    </span>

                                                </div>
                                                <!-- <div class="col-lg-6">
                                                    <span class="sub-text">Payment To</span>
                                                    <span
                                                        class="caption-text text-break">1x0385c87d264A05810653734f93</span>
                                                </div> -->
                                            </div><!-- .row -->
                                            <hr>
                                            <div class="nk-modal-head mt-sm-5 mt-4 mb-4">
                                                <h5 class="title">Products Details</h5>
                                            </div>
                                            <div class="container">
                                                <div class="row header">
                                                    <div class="col-2">Name</div>
                                                    <div class="col-2">Strength</div>
                                                    <div class="col-2">Price</div>
                                                    <div class="col-2">Quantity</div>
                                                    <div class="col-2">Total</div>
                                                    <div class="col-2">Status</div>
                                                </div>
                                                <hr>
                                                @if ($order->orderDetails)
                                                    
                                                    @foreach ($order->orderDetails as $detail)
                                                        <div class="row">
                                                            <div class="col-2">{{ $detail->productDetails->name ?? '' }}</div>
                                                            <div class="col-2">{{ $detail->variations->strength ?? '' }}mg</div>
                                                            <div class="col-2">$ {{ number_format($detail->price ?? 0,2) }}</div>
                                                            <div class="col-2">{{ $detail->quantity ?? '' }}</div>
                                                            <div class="col-2">$ {{ number_format($detail->total_price ?? 0,2) }}</div>
                                                            @if($detail->order_type == 'multi_time')
                                                            <div class="col-2"><span class="badge bg-primary">{{ $detail->paymentStatus->payment_status ?? '' }}</span></div>
                                                            @else
                                                            <div class="col-2"><span class="badge bg-primary">{{ $detail->PaymentDetail->payment_status ?? '' }}</span></div>
                                                            @endif
                                                        </div>
                                                        
                                                    @endforeach
                                                @endif
                                                <hr>
                                                <div class="row">
                                                    <div class="col-9 text-end"><strong>Total:</strong></div>
                                                    <div class="col-3">$ {{ number_format($order->price ?? 0,2) }}</div>
                                                </div>
                                            </div>

                                        </div>
                                </div>
                                <script>
                                    $('span#order-status').on('click',function(){
                                        status = $(this).attr('value');
                                        orderid = $(this).attr('order-id');
                                        $.ajax({
                                            url: '{{ url('admin-dashboard/orders/update') }}',
                                            method: 'post',
                                            data: { _token:"{{ csrf_token() }}",status:status,orderid:orderid },
                                            success:function(response){
                                                if(response.success){
                                                    $('.status'+orderid).html(response.status);
                                                    NioApp.Toast(response.success, 'info', {position: 'top-right'});
                                                }else if(response.error){
                                                    NioApp.Toast(response.error, 'error', {position: 'top-right'});
                                                }
                                            }

                                        })
                                    });
                                </script>
@endsection