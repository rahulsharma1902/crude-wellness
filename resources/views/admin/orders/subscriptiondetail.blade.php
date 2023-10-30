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
                                                    <li>Started At: <span class="text-base">{{ $metadetail->created_at ?? ''  }}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="html/kyc-list-regular.html" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
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
                                                            <div class="data-label">Submitted By</div>
                                                            <div class="data-value">UD01489</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Submitted At</div>
                                                            <div class="data-value">18 Dec, 2019 01:02 PM</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Status</div>
                                                            <div class="data-value"><span class="badge badge-dim badge-sm bg-outline-success">Approved</span></div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
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
                                                    </li>
                                                </ul>
                                            </div><!-- .card -->
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title">Uploaded Documents</h5>
                                                    <p>Here is user uploaded documents.</p>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="card card-bordered">
                                                <ul class="data-list is-compact">
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Document Type</div>
                                                            <div class="data-value">National ID Card</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Front Side</div>
                                                            <div class="data-value">National ID Card</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Back Side</div>
                                                            <div class="data-value">National ID Card</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Proof/Selfie</div>
                                                            <div class="data-value">National ID Card</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-lg-7">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <h5 class="nk-block-title title">Applicant Information</h5>
                                                    <p>Basic info, like name, phone, address, country etc.</p>
                                                </div>
                                            </div>
                                            <div class="card card-bordered">
                                                <ul class="data-list is-compact">
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">First Name</div>
                                                            <div class="data-value">Abu Bin</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Last Name</div>
                                                            <div class="data-value">Ishtiyak</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Email Address</div>
                                                            <div class="data-value">info@softnio.com</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Phone Number</div>
                                                            <div class="data-value text-soft"><em>Not available</em></div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Date of Birth</div>
                                                            <div class="data-value">28 Oct, 2015</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Full Address</div>
                                                            <div class="data-value">6516, Eldoret, Uasin Gishu, 30100</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Country of Residence</div>
                                                            <div class="data-value">Kenya</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Full Address</div>
                                                            <div class="data-value">6516, Eldoret, Uasin Gishu, 30100</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Wallet Type</div>
                                                            <div class="data-value">Bitcoin</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Wallet Address</div>
                                                            <div class="data-value text-break">1F1tAaz5x1HUXrCNLbtMDqcw6o5GNn4xqX</div>
                                                        </div>
                                                    </li>
                                                    <li class="data-item">
                                                        <div class="data-col">
                                                            <div class="data-label">Telegram</div>
                                                            <div class="data-value">
                                                                <span>@tokenlite</span> <a href="https://t.me/tokenlite" target="_blank"><em class="icon ni ni-telegram"></em></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .col -->
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
@endsection