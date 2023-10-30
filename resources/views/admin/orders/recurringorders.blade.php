@extends('admin_layout/master')
@section('content')

<div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Products Subscriptions</h4>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <table class="table table-tranx">
                                                <thead>
                                                    <tr class="tb-tnx-head">
                                                        <th class="tb-tnx-id"><span class="">Order Id</span></th>
                                                        <th class="tb-tnx-info">
                                                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                <span>Product Image</span>
                                                            </span>
                                                            <span class="tb-tnx-date d-md-inline-block d-none">
                                                                <span class="d-md-none">Date</span>
                                                                <span class="d-none d-md-block">
                                                                    <span>Product Name</span>
                                                                    <span>Strength</span>
                                                                </span>
                                                            </span>
                                                        </th>
                                                        <th class="tb-tnx-amount is-alt">
                                                            <span class="tb-tnx-total">Amount</span>
                                                            <span class="tb-tnx-status d-none d-md-inline-block">Subscription Status</span>
                                                        </th>
                                                        <th class="tb-tnx-action">
                                                            <span>&nbsp;</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($ordermeta as $meta)
                                                    <tr class="tb-tnx-item">
                                                        <td class="tb-tnx-id">
                                                            <a href="{{ url('admin-dashboard/orders/') }}/{{ $meta->orderdata->order_id ?? '' }}"><span>{{ $meta->orderdata->order_id ?? '' }}</span></a>
                                                        </td>
                                                        <td class="tb-tnx-info">
                                                            <div class="tb-tnx-desc text-center">
                                                                <span class="title text-center"><img src="{{ asset('productIMG') }}/{{ $meta->productDetails->featured_img ?? '' }}" alt="" width="50%"></span>
                                                            </div>
                                                            <div class="tb-tnx-date">
                                                                <span class="date">{{ $meta->productDetails->name ?? '' }}</span>
                                                                <span class="date">{{ $meta->variations->strength ?? '' }}mg</span>
                                                            </div>
                                                        </td>
                                                        <td class="tb-tnx-amount is-alt">
                                                            <div class="tb-tnx-total">
                                                                <span class="amount">${{ number_format($meta->total_price ?? 0,2) }}</span>
                                                            </div>
                                                            <div class="tb-tnx-status">
                                                                <span class="badge badge-dot bg-warning">@if($meta->status == 0) paused @elseif($meta->status == 1) active @endif</span>
                                                            </div>
                                                        </td>
                                                        <td class="tb-tnx-action">
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li><a href="{{ url('admin-dashboard/subscriptiondetail/') }}/{{ $meta->reccuring_id ?? '' }}">View</a></li>
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
@endsection