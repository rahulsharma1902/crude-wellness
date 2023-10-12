@extends('front_layout/master')
@section('content')
<section class="banner_wrapper p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner_content">
                        <div class="heading_wreap text-center">
                            <h2>Subscription</h2>
                            <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">subscription</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="program_wrapper p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="program_text text-center">
                        <h4>Introducing Our Revamped Subscription Program</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ url('login') }}" class="btn main-btn">Become A Member</a>
                            </li>
                            <li>Already a Member? <strong>Manage My Subscription</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq_wreap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="program_img">
                        <img src="{{ asset('front/img/program_1.png') }}" class="img-fluid" alt=""> 
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq-sec p-0">
                        <div class="heading_wreap">
                            <h4>The Perks</h4>
                        </div>
                        <div id="main">
                            <div class="accordion" id="faq">
                                <div class="card">
                                    <div class="card-header" id="faqhead1">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq1" aria-expanded="false" aria-controls="faq1">What is your best CBD oil to buy online?</a>
                                    </div>

                                    <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                                        <div class="card-body">
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis animi sed earum pariatur magni iusto, unde cumque officiis corporis impedit ipsa, accusantium nostrum dolor saepe quidem
                                                blanditiis id facilis?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead2">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2" aria-expanded="false" aria-controls="faq2">How long does shipping take?</a>
                                    </div>

                                    <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">
                                        <div class="card-body">
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis animi sed earum pariatur magni iusto, unde cumque officiis corporis impedit ipsa, accusantium nostrum dolor saepe quidem
                                                blanditiis id facilis?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead3">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3" aria-expanded="false" aria-controls="faq3">What are your business hours?</a>
                                    </div>

                                    <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                                        <div class="card-body">
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis animi sed earum pariatur magni iusto, unde cumque officiis corporis impedit ipsa, accusantium nostrum dolor saepe quidem
                                                blanditiis id facilis?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead4">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq4" aria-expanded="false" aria-controls="faq4">Where is your hemp grown?</a>
                                    </div>

                                    <div id="faq4" class="collapse" aria-labelledby="faqhead4" data-parent="#faq">
                                        <div class="card-body">
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis animi sed earum pariatur magni iusto, unde cumque officiis corporis impedit ipsa, accusantium nostrum dolor saepe quidem
                                                blanditiis id facilis?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="faqhead4">
                                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq5" aria-expanded="false" aria-controls="faq5">What is your best seller?</a>
                                    </div>

                                    <div id="faq5" class="collapse" aria-labelledby="faqhead5" data-parent="#faq">
                                        <div class="card-body">
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis animi sed earum pariatur magni iusto, unde cumque officiis corporis impedit ipsa, accusantium nostrum dolor saepe quidem
                                                blanditiis id facilis?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-sec crude_wrapper p_m_120 mb-0" style="background-color: rgb(255 104 35 / 6%);">
        <div class="container">
            <div class="heading_wreap">
                <h4>What people are saying about Crude</h4>
            </div>
            <div class="testimonial-slider">
                <div class="testimonial-list">
                    <div class="testimonial-para">
                        <div class="test_view">
                            <div class="test_img">
                                <img src="{{ asset('front/img/testimonial_4.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="test_hd">
                                <h6>Jerry C. Prentice</h6>
                                <ul class="start_view">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <p>
                            “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                        </p>
                    </div>
                </div>
                <div class="testimonial-list">
                    <div class="testimonial-para">
                        <div class="test_view">
                            <div class="test_img">
                                <img src="{{ asset('front/img/testimonial_4.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="test_hd">
                                <h6>Ruth D. Grinnell</h6>
                                <ul class="start_view">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <p>
                            “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                        </p>
                    </div>
                </div>
                <div class="testimonial-list">
                    <div class="testimonial-para">
                        <div class="test_view">
                            <div class="test_img">
                                <img src="{{ asset('front/img/testimonial_4.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="test_hd">
                                <h6>Orlando R. Bean</h6>
                                <ul class="start_view">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <p>
                            “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                        </p>
                    </div>
                </div>
                <div class="testimonial-list">
                    <div class="testimonial-para">
                        <div class="test_view">
                            <div class="test_img">
                                <img src="{{ asset('front/img/testimonial_4.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="test_hd">
                                <h6>Jerry C. Prentice</h6>
                                <ul class="start_view">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <p>
                            “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="works_wrapper p_120">
        <div class="container"> 
            <div class="row">
                <div class="col-lg-12">
                    <h4>How It Works</h4>
                    <div class="works_grid">
                        <div class="card">
                            <div class="works_bg">
                                <span>1</span>
                            </div>
                            <div class="card-body">
                                <h6>Choose a Product</h6>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="works_bg">
                                <span>2</span>
                            </div>
                            <div class="card-body">
                                <h6>Access Your Account</h6>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                </p>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('login') }}">Register</a></li>
                                    <li>or</li>
                                    <li><a href="{{ url('login') }}">Login</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="works_bg">
                                <span>3</span>
                            </div>
                            <div class="card-body">
                                <h6>Enjoy the Crude</h6>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection