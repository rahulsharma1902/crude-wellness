@extends('admin_layout/master')
@section('content')

<div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Users List</h4>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <table class="table table-tranx">
                                                <thead>
                                                    <tr class="tb-tnx-head">
                                                        <th class="tb-tnx-id"><span class="">#</span></th>
                                                        <th class="tb-tnx-info">
                                                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                <span>Email</span>
                                                            </span>
                                                            <span class="tb-tnx-date d-md-inline-block d-none">
                                                                <span class="d-md-none">Date</span>
                                                                <span class="d-none d-md-block">
                                                                    <span>Name</span>
                                                                    <span>Joined on</span>
                                                                </span>
                                                            </span>
                                                        </th>
                                                        <th class="tb-tnx-action">
                                                            <span>&nbsp;</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $count = 1; ?>
                                                @foreach($users as $user)
                                                    <tr class="tb-tnx-item">
                                                        <td class="tb-tnx-id">
                                                            <a href="#"><span>{{ $count++ }}</span></a>
                                                        </td>
                                                        <td class="tb-tnx-info">
                                                            <div class="tb-tnx-desc">
                                                                <span class="title">{{ $user->email ?? '' }}</span>
                                                            </div>
                                                            <div class="tb-tnx-date">
                                                                <span class="date">{{ $user->name ?? '' }}</span>
                                                                <span class="date">{{ $user->created_at ?? '' }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="tb-tnx-action">
                                                            <!-- <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li><a href="#">View</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div> -->
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div><!-- .card-preview -->
                                    </div>

@endsection