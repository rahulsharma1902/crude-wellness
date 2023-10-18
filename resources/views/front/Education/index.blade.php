@extends('front_layout/master')
@section('content')
<section class="banner_wrapper p_120" style="background-color: rgba(255, 165, 0, 0.11);background-image: unset;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner_content">
                    <div class="heading_wreap text-center">
                        <h2>Wellness Education</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="edtion_wrapper reviews_wrapper p_120 m-0">
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
            @if($blogcategories->isNotEmpty())
                <div class="text-center">
                    <h4>Browse Categories</h4>
                </div>
                <div class="terms_wreapper">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">All </a>
                        </li>
                        @foreach($blogcategories as $category)
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#{{ $category->slug ?? '' }}"
                                role="tab" aria-controls="{{ $category->slug ?? '' }}" aria-selected="false">{{ $category->name ?? '' }}</a>
                        </li>
                        @endforeach
                       
                    </ul>
                </div>
                @endif
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="blog_grid">
                        @foreach($blogwithoutcat as $blog)
                            <a href="{{ url('/education-details/') ?? '' }}/{{ $blog->slug ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('blog_images/'.$blog->image) ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>{{ $blog->title ?? '' }}</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        </div>
                    </div>
                    @foreach($blogcategories as $category)
                    <div class="tab-pane fade" id="{{ $category->slug ?? '' }}" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="blog_grid">
                            @foreach($category->blogs as $blogs)
                            <a href="{{ url('education-details/') }}/{{ $blogs->slug ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('blog_images/'.$blogs->image) ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>{{ $blogs->title ?? '' }}</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @if($blogcategories->isEmpty())
           <div class="col-lg-12 text-center">
            <h2 class="text-center">No Blogs Found</h2>
           </div> 
            @endif
        </div>
    </div>
</section>

@endsection