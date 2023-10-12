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
                <div class="text-center">
                    <h4>Browse Categories</h4>
                </div>
                <div class="terms_wreapper">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">All </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                role="tab" aria-controls="pills-contact" aria-selected="false">Doctor's Advice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-privacy-tab" data-toggle="pill" href="#pills-privacy"
                                role="tab" aria-controls="pills-privacy" aria-selected="false">Hemp Gummies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-Recurring-tab" data-toggle="pill" href="#pills-Recurring"
                                role="tab" aria-controls="pills-Recurring" aria-selected="false">Natural Oil</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="blog_grid">
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog2.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog3.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog4.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog5.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog6.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog7.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog8.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog9.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="blog_grid">
                            <a href="#">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog2.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog3.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog4.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="blog_grid">
                            <a href="#">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog2.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-privacy" role="tabpanel" aria-labelledby="pills-privacy-tab">
                        <div class="blog_grid">
                            <a href="#">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-Recurring" role="tabpanel"
                        aria-labelledby="pills-Recurring-tab">
                        <div class="blog_grid">
                            <a href="#">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ url('/education-details/ss') ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('front/img/blog2.png') ?? '' }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6>Lorem Ipsum is simply dummy text</h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection