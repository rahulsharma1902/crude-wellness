@extends('admin_layout/master')
@section('content')
<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Subscription / <strong class="text-primary small">{{ $metadetail->reccuring_id ?? '' }}</strong></h3>
                                            <div class="nk-block-des text-soft">
                                                <ul class="list-inline">
                                                    <li>Order ID: <span class="text-base">{{ $metadetail->orderdata->order_id ?? '' }}</span></li>
                                                    <li>Started At: <span class="text-base">{{ \Carbon\Carbon::parse($metadetail->created_at)->format('F j, Y, g:i A') }}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="{{ url('admin-dashboard/recurringorders') ?? '' }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                            <a href="html/kyc-list-regular.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row gy-5">
                                        <div class="col-lg-5">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title">Subscription Info</h5>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="card card-bordered">
                                                <ul class="data-list is-compact">
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Started At</div>
                                                            <div class="data-value" style="font-size: small;">{{ \Carbon\Carbon::parse($metadetail->userSubscription->started_on)->format('F j, Y, g:i A') }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">End At</div>
                                                            <div class="data-value" style="font-size: inherit;">{{ \Carbon\Carbon::parse($metadetail->userSubscription->end_on)->format('F j, Y, g:i A') }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Status</div>
                                                            <div class="data-value"><span class='badge badge-dim badge-sm bg-outline-{{ $metadetail->userSubscription->subscription_status == 0 ? "warning" : ($metadetail->userSubscription->subscription_status == "active" ? "success" : ($metadetail->userSubscription->subscription_status == 2 ? "info" : "danger")) }}'>{{ $metadetail->userSubscription->subscription_status == 0 ? "Pending" : ($metadetail->userSubscription->subscription_status == "active" ? "Active" : ($metadetail->userSubscription->subscription_status == 2 ? "Pause" : "Cancelled")) }}</span></div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Delivery Status</div>
                                                            <div class="data-value"><span class='badge badge-dim badge-sm bg-outline-success'>{{ $metadetail->status == 0 ? 'Pending' : ($metadetail->status == 1 ? 'Confirmed' : ($metadetail->status == 2 ? 'Shipped' : 'delivered'))  }}</span></div>
                                                        </div>
                                                    </li>
                                                    <!-- <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Last Checked</div>
                                                            <div class="data-value">
                                                                <div class="user-card">
                                                                    <div class="user-avatar user-avatar-xs bg-orange-dim">
                                                                        <span>AB</span>
                                                                    </div>
                                                                    <div class="user-name">
                                                                        <span class="tb-lead">Saiful Islam</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Last Checked At</div>
                                                            <div class="data-value">19 Dec, 2019 05:26 AM</div>
                                                        </div>
                                                    </li> -->
                                                </ul>
                                            </div><!-- .card -->
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title">Product Details</h5>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="card card-bordered">
                                                <ul class="data-list is-compact">
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Product Name</div>
                                                            <div class="data-value">{{ $metadetail->productDetails->name ?? '' }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Strength</div>
                                                            <div class="data-value">{{ $metadetail->variations->strength ?? '' }} MG</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Price</div>
                                                            <div class="data-value">${{ number_format($metadetail->price ?? 0,2) }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Quantity</div>
                                                            <div class="data-value">{{ $metadetail->quantity ?? '' }}</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-lg-7">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title">Applicant Information</h5>
                                                    <!-- <p>Basic info, like name, phone, address, country etc.</p> -->
                                                </div>
                                            </div>
                                            <div class="card card-bordered">
                                                <ul class="data-list is-compact">
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">First Name</div>
                                                            <div class="data-value">{{ $metadetail->orderdata->user->address->first_name ?? 'Not available' }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Last Name</div>
                                                            <div class="data-value">{{ $metadetail->orderdata->user->address->last_name ?? 'Not available' }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Email Address</div>
                                                            <div class="data-value">{{ $metadetail->orderdata->user->email ?? 'Not available' }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Phone Number</div>
                                                            <div class="data-value text-soft">{{ $metadetail->orderdata->user->address->mobiles ?? 'Not available' }}</div>
                                                        </div>
                                                    </li>
                                                   
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Full Address</div>
                                                            <div class="data-value">{{ $metadetail->orderdata->user->address->address ?? '' }},{{ $metadetail->orderdata->user->address->city ?? '' }},{{ $metadetail->orderdata->user->address->state ?? '' }} {{ $metadetail->orderdata->user->address->zipcodes ?? '' }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Country of Residence</div>
                                                            <div class="data-value">{{ $metadetail->orderdata->user->address->region ?? '' }}</div>
                                                        </div>
                                                    </li>
                                                   
                                                   
                                                </ul>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-lg-12">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title">Order Payment History</h5>
                                                    <!-- <p>Basic info, like name, phone, address, country etc.</p> -->
                                                </div>
                                            </div>
                                            <div class="card card-bordered">
                                            <table class="table">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Period Start</th>
                                                        <th scope="col">Period End</th>
                                                        <th scope="col">Delivery Status</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($metadetail->userSubscription->started_on)->format('F j, Y, g:i A') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($metadetail->userSubscription->end_on)->format('F j, Y, g:i A') }}</td>
                                                        <td><button class="btn btn-success btn-md"> @if($metadetail->delivery_status == 0) Pending @elseif($metadetail->delivery_status == 1) Confirmed @elseif($metadetail->delivery_status == 2) Shipped @elseif($metadetail->delivery_status == 3) Delivered @endif</button> </td>
                                                        <td>{{ $metadetail->userSubscription->subscription_status == 0 ? "Pending" : ($metadetail->userSubscription->subscription_status == "active" ? "Active" : ($metadetail->userSubscription->subscription_status == 2 ? "Pause" : "Cancelled")) }}</td>
                                                    </tr>
                                                    
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div><!-- .col -->
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
@endsection