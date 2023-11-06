@extends('admin_layout/master')
@section('content')

<div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content d-flex justify-content-between">
                                                <h4 class="nk-block-title">Reviews List</h4>
                                                {{ Breadcrumbs::render('reviews') }}
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <table class="table table-tranx">
                                                <thead class="text-center">
                                                    <tr class="tb-tnx-head">
                                                        <th class="tb-tnx-id"><span class="">#</span></th>
                                                        <th class="tb-tnx-info">
                                                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                                <span>Review</span>
                                                            </span>
                                                            <span class="tb-tnx-date d-md-inline-block d-none">
                                                                <span class="d-md-none">Date</span>
                                                                <span class="d-none d-md-block">
                                                                    <span>User Name</span>
                                                                    <span>User type</span>
                                                                </span>
                                                            </span>
                                                        </th>
                                                        <th class="tb-tnx-amount is-alt">
                                                            <span class="tb-tnx-total">Position</span>
                                                            <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                                                        </th>
                                                        <th class="tb-tnx-action">
                                                            <span>&nbsp;</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    @foreach($reviews as $review)
                                                    <tr class="tb-tnx-item">
                                                        <td class="tb-tnx-id">
                                                           <img src="{{ asset('reviewsIMG') }}/{{ $review->image ?? '' }}" alt="">
                                                        </td>
                                                        <td class="tb-tnx-info">
                                                            <div class="tb-tnx-desc">
                                                                <span class="title">{{ substr($review->text,0,30) ?? '' }}...</span>
                                                            </div>
                                                            <div class="tb-tnx-date">
                                                                <span class="date">{{ $review->review_by ?? '' }}</span>
                                                                <span class="date">{{ $review->category->name ?? '' }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="tb-tnx-amount is-alt">
                                                            <div class="tb-tnx-total">
                                                                <span class="amount">{{ $review->position ?? '' }}</span>
                                                            </div>
                                                            <div class="tb-tnx-status">
                                                                <span class="badge badge-dot bg-warning">active</span>
                                                            </div>
                                                        </td>
                                                        <td class="tb-tnx-action">
                                                            <div class="dropdown">
                                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li><a href="{{ url('admin-dashboard/addreviews') }}/{{ $review->id ?? '' }}">Edit</a></li>
                                                                        <li><a link="{{ url('admin-dahboard/reviews/delete/') }}/{{ $review->id ?? '' }}" class="remove">Remove</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @if($reviews->isEmpty())
                                            <h4 class="text-center">No Reviews Available</h4>
                                            @endif
                                        </div><!-- .card-preview -->
                                    </div>
                                    <script>
                                         $('.remove').on('click',function(){
                                            link = $(this).attr('link');
                                            Swal.fire({
                                                title: 'Are you sure to delete this subscription?',
                                                icon: 'info',
                                                showCancelButton: true,
                                                confirmButtonText: 'Yes',
                                                cancelButtonText: 'No',
                                                confirmButtonColor: '#008000',
                                                allowOutsideClick: false,
                                                allowEscapeKey: false
                                                }).then((result) => {
                                            if (result.isConfirmed) {

                                                window.location.href = link;
                                            } 
                                            });
                                        });
                                    </script>
@endsection