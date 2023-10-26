@extends('admin_layout/master')
@section('content')
<div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Payment List </h4>
                                               
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <table class="table table-tranx">
                                                <thead>
                                                    <tr class="tb-tnx-head">
                                                        <th class="tb-tnx-id"><span class="">Order id</span></th>
                                                        <th class="tb-tnx-info">
                                                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                <span>Payment Intent</span>
                                                            </span>
                                                            <span class="tb-tnx-date d-md-inline-block d-none">
                                                                <span class="d-md-none">Date</span>
                                                                <span class="d-none d-md-block">
                                                                    <span>Amount</span>
                                                                    <span>Payment Type</span>
                                                                </span>
                                                            </span>
                                                        </th>
                                                        <th class="tb-tnx-amount is-alt">
                                                            <span class="tb-tnx-total">Recurring Period</span>
                                                            <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                                                        </th>
                                                        <th class="tb-tnx-action">
                                                            <span>&nbsp;</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            @foreach($payments as $payment)
                                                    <tr class="tb-tnx-item">
                                                        <td class="tb-tnx-id">
                                                            <a href="{{ url('admin-dashboard/orders/'.$payment->Order->order_id) }}"><span>{{ $payment->Order->order_id ?? '' }}</span></a>
                                                        </td>
                                                        <td class="tb-tnx-info">
                                                            <div class="tb-tnx-desc">
                                                                <span class="title">{{ $payment->payment_intent ?? '' }}</span>
                                                            </div>
                                                            <div class="tb-tnx-date">
                                                                <span class="date">${{ number_format($payment->payment_amount,2) ?? '' }}</span>
                                                                <span class="date">{{ $payment->payment_type ?? '' }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="tb-tnx-amount is-alt">
                                                            <div class="tb-tnx-total">
                                                                <span class="amount"> {{ $payment->ordermeta->subscriptiondetail->recurring_period ?? '-'}} {{ $payment->ordermeta->subscriptiondetail->recurring_type ?? ''}}</span>
                                                            </div>
                                                            <div class="tb-tnx-status">
                                                                @if($payment->payment_status == 'succeeded')
                                                                <span class="badge badge-dot bg-success">{{ $payment->payment_status ?? '' }}</span>
                                                                @else
                                                                <span class="badge badge-dot bg-danger">{{ $payment->payment_status ?? '' }}</span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td class="tb-tnx-action">
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li><a data-bs-toggle="modal" data-bs-target="#modalDefault{{ $payment->id ?? '' }}">View Products</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div><!-- .card-preview -->
                                    </div>
                                    <!-- Modal Content Code -->
                        @foreach($payments as $payment)
                                    <div class="modal fade" tabindex="-1" id="modalDefault{{ $payment->id ?? '' }}">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <em class="icon ni ni-cross"></em>
                                                </a>
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Products</h5>
                                                </div>
                                                <div class="modal-body">
                                               
                                                    @if($payment->payment_type == 'Recurring')
                                                    <div class="card card-bordered pricing">
                                                        <div class="pricing-head">
                                                            <div class="pricing-title">
                                                                <img src="{{ asset('productIMG') }}/{{ $payment->ordermeta->productDetails->featured_img ?? '' }}" alt="" width="40%">
                                                                <h4 class="card-title title">{{ $payment->ordermeta->productDetails->name ?? '' }}</h4>
                                                            </div>
                                                            <div class="card-text">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="h4 fw-500">Strength : {{ $payment->ordermeta->variations->strength ?? '' }}mg</span>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <span class="h4 fw-500">Price : ${{ number_format($payment->ordermeta->price,2) ?? '' }}</span>
                                                                    </div>
                                                                    <div class="col-12">
                                                                     <span class="h4 fw-500">Quantity : {{ $payment->ordermeta->quantity ?? '' }}</span>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <span class="h4 fw-500">Total Price : ${{ number_format($payment->ordermeta->total_price,2) ?? '' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @elseif($payment->payment_type =='one_time')
                                                        @if(isset($payment->ordermetas))
                                                            @foreach($payment->ordermetas as $metas)
                                                        <div class="card card-bordered pricing">
                                                        <div class="pricing-head">
                                                            <div class="pricing-title">
                                                                <img src="{{ asset('productIMG') }}/{{ $metas->productDetails->featured_img ?? '' }}" alt="" width="20%">
                                                                <h4 class="card-title title">{{ $metas->productDetails->name ?? '' }}</h4>
                                                            </div>
                                                            <div class="card-text">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span class="h4 fw-500">Strength : {{ $metas->variations->strength ?? '' }}mg</span>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <span class="h4 fw-500">Price : ${{ number_format($metas->price,2) ?? '' }}</span>
                                                                    </div>
                                                                    <div class="col-12">
                                                                     <span class="h4 fw-500">Quantity : {{ $metas->quantity ?? '' }}</span>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <span class="h4 fw-500">Total Price : ${{ number_format($metas->total_price,2) ?? '' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="modal-footer bg-light">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        @endforeach

@endsection