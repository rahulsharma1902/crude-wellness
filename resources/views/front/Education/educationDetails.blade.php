@extends('front_layout/master')
@section('content')

<section class="blog_wrapper blog_detial_wrapper m-0 p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_content">
                        <div class="blog1_img">
                            <img src="{{ asset('blog_images/'.$blog->image) ?? '' }}" class="img-fluid" alt="">
                        </div>
                        <strong>{{ date('M d, Y', strtotime($blog->created_at)) }}</strong>
                        <h4>{{ $blog->title ?? '' }}</h4>
                        <?php if(isset($blog->description)){ echo $blog->description; } ?>
                    </div>
                    <div class="inerblog_p">
                        <p>{{ $blog->sub_title ?? '' }}</p>
                    </div>
                    <div class="blog_content">
                        <div>
                           <?php if(isset($blog->short_description)){ echo $blog->short_description; } ?>
                        </div>
                    </div>
                    <div class="prv_next_wreap">
                        <ul class="list-unstyled">
                            <li class="{{ $previousBlog->slug ?? 'active' }}"><a href="{{ $previousBlog->slug ?? '' }}" class="btn"><i class="fa-solid fa-arrow-left"></i> Previous Post</a>
                            </li>
                            <li class="{{ $nextBlog->slug ?? 'active' }}"><a href="{{ $nextBlog->slug ?? '' }}" class="btn">Next Post <i class="fa-solid fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar_wrapper">
                        <div class="recent_wreap">
                            <h5>Recent Posts</h5>
                        </div>
                        <ul class="list-group">
                            @foreach($recentblogs as $blog)
                            <li class="list-group-item">
                                <div>
                                    <h6>
                                        <a href="{{ url('education-details/'.$blog->slug) }}">{{ $blog->title ?? '' }}</a>
                                    </h6>
                                    <p>
                                    {{ date('M d, Y', strtotime($blog->created_at)) }}   
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection