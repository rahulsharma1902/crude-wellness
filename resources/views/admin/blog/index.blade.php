@extends('admin_layout/master')
@section('content')

<div class="nk-block">
                        <div class="p-4 d-flex justify-content-between">
                            <h2>Blogs list</h2>
                            {{ Breadcrumbs::render('blogs-list') }}
                        </div>
                                    <div class="row g-gs">
                                    @foreach($blogs as $blog)
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="card card-bordered product-card">
                                                <div class="product-thumb">
                                                    <a>
                                                        <img class="card-img-top" src="{{ asset('blog_images/'.$blog->image) }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="card-inner text-center">
                                                    <h5 class="product-title"><a >{{ $blog->title ?? '' }}</a></h5>
                                                </div>
                                                <div class="card-inner text-center">
                                                    <a href="{{ url('admin-dashboard/blogs/add/'.$blog->slug) }}" class="btn btn-primary">Edit</a>
                                                    <a link="{{ url('admin-dashboard/blogs/delete/'.$blog->id) }}" class="btn btn-danger remove">Delete</a>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                      @endforeach
                                    </div>
                                </div>
                                <script>
                                     $('.remove').on('click',function(){
                                        link = $(this).attr('link');
                                        Swal.fire({
                                            title: 'Are you sure to delete this blog?',
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