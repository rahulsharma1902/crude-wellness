@extends('admin_layout/master')
@section('content')
<div class="nk-block nk-block-lg" id="maindiv">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Orders Table</h4>
            <div class="nk-block-des">
                <p><code class="code-class"></code> </p>
            </div>
        </div>
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <button class="btn btn-danger my-1 delbtn d-none"><i class="bi bi-trash"></i></button>
            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false" id="table">
                <thead>

                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext " id="maincheck">
                                <input type="checkbox" class="custom-control-input checkall" id="page-0">
                                <label class="custom-control-label" for="page-0"></label>
                            </div>
                        </th>
                        <th class="nk-tb-col"><span class="sub-text">Order Id</span></th>
                        <th class="nk-tb-col"><span class="sub-text"></span>Customer ID</th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">User Name</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Amount</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($orders)
                    @foreach ($orders as $order)

                    <tr class="nk-tb-item tr">

                        <td class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input checkbox" id="{{ $order->id ?? '' }}"
                                    data-id="">
                                <label class="custom-control-label" for="{{ $order->id ?? '' }}"></label>
                            </div>
                        </td>
                        <td class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <div>{{ $order->order_id ?? '' }}</div>
                            </div>
                        </td>

                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-info">
                                    {{ $order->stripe_customer_id ?? '' }}
                                </div>
                            </div>
                        </td>

                        <td class="nk-tb-col tb-col-mb">
                            <span class="tb-amount">
                                {{ $order->user->name ?? '' }}
                            </span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span>
                                {{ $order->price ?? '' }}
                            </span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span>
                                <?php $status = true; ?>
                              @if(isset($order->payment))
                                @foreach($order->payment as $payments)
                                    @if($payments->payment_status == 'incomplete')
                                    <?php $status = false;  ?>
                                    @endif
                                @endforeach
                              @endif
                                @if($status == true)
                                    confirmed
                                @else
                                    pending
                                @endif
                            </span>
                        </td>


                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="d-flex">

                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                            data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">

                                            <ul class="link-list-opt no-bdr">
                                                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTop">Modal Top</button> -->
                                                <!-- <li><a href="" class="openModel" data-target="orderDetails{{$order->id ?? '' }}" data-bs-toggle="modal" data-bs-target="#modalTop"><em class="icon ni ni-eye"></em></em><span>View Details</span></a></li>                                                     -->
                                                <li>
                                                    <a href="#ordrDetails{{ $order->id ?? '' }}" data-bs-toggle="modal"
                                                        class="" title="Details"><em class="icon ni ni-eye"></em>View
                                                        Details</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <div class="modal fade" tabindex="-1" id="ordrDetails{{ $order->id ?? '' }}">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-dialog modal-dialog-top" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Order Details</h5>
                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <em class="icon ni ni-cross"></em>
                                        </a>
                                    </div>
                                    <div class="modal-body modal-body-md">
                                        <div class="nk-modal-head mb-3 mb-sm-5">
                                            <h4 class="nk-modal-title title">Transaction <small
                                                    class="text-primary">{{ $order->order_id ?? '' }}</small></h4>
                                        </div>
                                        <div class="nk-tnx-details">
                                            <div class="nk-block-between flex-wrap g-3">
                                                <div class="nk-tnx-type">
                                                    <div class="nk-tnx-type-icon bg-{{ $order->status == 0 ? 'warning' : 'success' }} text-white">
                                                        <em class="icon ni ni-arrow-up-right"></em>
                                                    </div>
                                                    <div class="nk-tnx-type-text">
                                                        <h5 class="title">{{ $order->status == 0 ? "Pending" : "Complete" }}</h5>
                                                        <span class="sub-text mt-n1">{{ $order->created_at ?? '' }}</span>
                                                    </div>
                                                </div>
                                                <ul class="align-center flex-wrap gx-3">
                                                    <li>
                                                        <span class="badge badge-sm badge-success text-{{ $order->status == 0 ? 'warning' : 'success' }}">{{ $order->status == 0 ? "Pending" : "Complete" }}</span>
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
                                                    <span class="caption-text">${{ $order->price ?? '' }}</span>
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
                                                            <div class="col-2">$ {{ $detail->price ?? '' }}</div>
                                                            <div class="col-2">{{ $detail->quantity ?? '' }}</div>
                                                            <div class="col-2">$ {{ $detail->total_price ?? '' }}</div>
                                                            @if($detail->order_type == 'multi_time')
                                                            <div class="col-2"><span class="badge bg-primary"><?php print_r($detail->paymentStatus->payment_status); ?></span></div>
                                                            @else
                                                            <div class="col-2"><span class="badge bg-primary"><?php print_r($detail->PaymentDetail->payment_status);  ?></span></div>
                                                            @endif
                                                        </div>
                                                        
                                                    @endforeach
                                                @endif
                                                <hr>
                                                <div class="row">
                                                    <div class="col-9 text-end"><strong>Total:</strong></div>
                                                    <div class="col-3">$ {{ $order->price ?? '' }}</div>
                                                </div>
                                            </div>

                                        </div><!-- .nk-tnx-details -->
                                    </div>
                                    <div class="modal-footer bg-light">
                                        <span class="sub-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->
</div> <!-- nk-block -->

<script>
// $(document).ready( function(){
//     $('.openModel').on('click', function(e){
//         e.preventDefault();
//         console.log('click...');
//         modelClass = $(this).attr('data-target');
//         $('.'+modelClass).show();
//     });
// });
</script>
@endsection