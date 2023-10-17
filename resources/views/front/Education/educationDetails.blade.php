@extends('front_layout/master')
@section('content')

<section class="blog_wrapper blog_detial_wrapper m-0 p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_content">
                        <div class="blog1_img">
                            <img src="{{ asset('/blog_images/'.$blog->image) ?? '' }}" class="img-fluid" alt="">
                        </div>
                        <strong>{{ $blog->created_at->format('Y-m-d') }}</strong>
                        <h4>{{ $blog->title }}</h4>
                        {{-- <p>
                            <?php echo($blog->short_description) ?>
                        </p> --}}
                        {{-- <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </p> --}}
                    </div>
                    {{-- <div class="inerblog_p">
                        <p>{{ $blog->sub_title }}</p>
                    </div> --}}
                    <div class="blog_content">
                        <div>
                            <p>
                                <?php echo($blog->description)?>
                            </p>
                        </div>
                    </div>
                    <div class="prv_next_wreap">
                        <ul class="list-unstyled">
                            <li><a href="#" class="btn"><i class="fa-solid fa-arrow-left"></i> Previous Post</a>
                            </li>
                            <li class="active"><a href="#" class="btn">Next Post <i class="fa-solid fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar_wrapper">
                        @if($latestblog->count()>0)
                        <div class="recent_wreap">
                            <h5>Recent Posts</h5>
                        </div>
                        <ul class="list-group">
                            @foreach($latestblog as $new)
                            <li class="list-group-item">
                                <div>
                                    <h6>
                                        <a href="#">{{ $new->slug }}</a>
                                    </h6>
                                    <p>
                                        {{ $new->created_at->format('Y-m-d') }}
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <div class="recent_wreap">
                            <h5>no recent posts</h5>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection