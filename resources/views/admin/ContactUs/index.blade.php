@extends('admin_layout/master')
@section('content')
<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content d-flex justify-content-between">
            <h4 class="nk-block-title">Contact Us - List</h4>
            {{ Breadcrumbs::render('contact-us') }}
        </div>
    </div>
    <div class="card card-bordered card-preview">
        <table class="table table-tranx">
            <thead>
                <tr class="tb-tnx-head">
                    <th class="tb-tnx-id"><span class="">#</span></th>
                    <th class="tb-tnx-info">
                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                            <span>Name</span>
                        </span>
                        <span class="tb-tnx-date d-md-inline-block d-none">
                            <span class="">Email</span>
                            
                        </span>
                    </th>
                    <!-- <th class="tb-tnx-info">
                            <span>Name</span>
                        
                    </th>
                    <th class="tb-tnx-info">
                            <span>Email</span>
                        
                    </th> -->
                
                    <th class="tb-tnx-amount is-alt">
                        <span class="tb-tnx-total">Message</span>
                    </th>
                    <th class="tb-tnx-action">
                        <span>Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if($messages)
                @foreach($messages as $key => $msg)
                <tr class="tb-tnx-item">
                    <td class="tb-tnx-id">
                        <span>{{ $key+1 ?? '' }}</span>
                    </td>
                    <td class="tb-tnx-info">
                        <div class="tb-tnx-desc">
                            <span class="title">{{ $msg->name ?? '' }}</span>
                        </div>
                        <div class="tb-tnx-date">
                        <a href="mailto:{{ $msg->email ?? '' }}">
                            <span class="amount">{{ $msg->email ?? '' }}</span>
                        </a>
                        </div>
                    </td>
                 
                    <td class="tb-tnx-info">

                        <div class="tb-tnx-desc"  data-bs-toggle="modal" data-bs-target="#modalDefault{{ $msg->id ?? '' }}">
                            <span class="title" style="cursor:pointer;">  {{ \Illuminate\Support\Str::limit($msg->message, 50, '...') }}</span>
                        </div>
                    </td>
                    <div class="modal fade" tabindex="-1" id="modalDefault{{ $msg->id ?? '' }}">
                        <div class="modal-dialog modal-dialog-top" role="document">
                            <div class="modal-content">
                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                                <div class="modal-header">
                                    <h5 class="modal-title">Message From : {{ $msg->name ?? '' }}</h5>
                                </div>
                                <div class="modal-body">
                                    <p>{{ $msg->message ?? '' }}</p>
                                </div>
                             
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <td class="tb-tnx-action">
                        <div class="dropdown">
                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em
                                    class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                <ul class="link-list-plain">
                                    <li><a href="{{ url('admin-dashboard/removeContactUs') ?? '' }}/{{ $msg->id ?? '' }}">Remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
             
                @endif
            </tbody>
        </table>
    </div><!-- .card-preview -->
</div>
@endsection