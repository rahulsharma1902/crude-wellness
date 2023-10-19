@extends('front_layout/master')
@section('content')
<section class="home-banner" style="background-image: url({{ asset('front/img/home-banner.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-text">
                        <h2>Welcome to Crude Wellness.</h2>
                        <p>
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                    <a href="{{ url('shop') }}" class="main-btn">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <section class="best-sec p_120" style="background: rgb(126 61 188 / 2%);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading_wreap text_width">
                        <h4>Take the Guesswork Out of Good Health</h4>
                        <p>Choose how you want to feel to get started:</p>
                    </div>
                    <div class="prod_wrapper">
                        <div class="best-box">
                            <div class="best-img">
                                <img src="{{ asset('front/img/bestimg1.png') }}" alt="" />
                            </div>
                            <div class="best-warp">
                                <div class="best-text">
                                    <h6>Neuro Protective</h6>
                                    <p>Lorem Ipsum is simply dummy</p>
                                </div>
                            </div>
                        </div>
                        <div class="best-box">
                            <div class="best-img">
                                <img src="{{ asset('front/img/bestimg2.png') }}" alt="" />
                            </div>
                            <div class="best-warp">
                                <div class="best-text">
                                    <h6>Reduce PTSD</h6>
                                    <p>Lorem Ipsum is simply dummy</p>
                                </div>
                            </div>
                        </div>
                        <div class="best-box">
                            <div class="best-img">
                                <img src="{{ asset('front/img/bestimg3.png') }}" alt="" />
                            </div>
                            <div class="best-warp">
                                <div class="best-text">
                                    <h6>Neuro Protective</h6>
                                    <p>Lorem Ipsum is simply dummy</p>
                                </div>
                            </div>
                        </div>
                        <div class="best-box">
                            <div class="best-img">
                                <img src="{{ asset('front/img/bestimg1.png') }}" alt="" />
                            </div>
                            <div class="best-warp">
                                <div class="best-text">
                                    <h6>Pain Relief</h6>
                                    <p>Lorem Ipsum is simply dummy</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="trust-sec p_120 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading_wreap">
                        <h4>Lab Reports of The Oils</h4>
                        <p>
                            All our products are third party lab tested for constancy & potency via GMP Certified facility.
                        </p>
                        <a href="{{ url('shop') }}" class="main-btn btn_light">Shop The Collection</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-sec p_120">
        <div class="container">
            <div class="heading_wreap">
                <h4>Trusted by Doctors</h4>
            </div>
            <div class="testimonial-slider">
                <div class="testimonial-list">
                    <div class="testimonial-para">
                        <div class="test_view">
                            <div class="test_img">
                                <img src="{{ asset('front/img/testimonial_1.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="test_hd">
                                <h6>Jerry C. Prentice</h6>
                                <span>Physician and Author</span>
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
                                <img src="{{ asset('front/img/testimonial_2.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="test_hd">
                                <h6>Ruth D. Grinnell</h6>
                                <span>Ruth D. Grinnell</span>
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
                                <img src="{{ asset('front/img/testimonial_3.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="test_hd">
                                <h6>Orlando R. Bean</h6>
                                <span>Orlando R. Bean</span>
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
                                <img src="{{ asset('front/img/testimonial_1.png') }}" class="img-fluid" alt="">
                            </div>
                            <div class="test_hd">
                                <h6>Jerry C. Prentice</h6>
                                <span>Physician and Author</span>
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

    <section class="doctor_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="doctor_content">
                        <ul class="list-unstyled">
                            <li>
                                <img src="{{ asset('front/img/docter1.png') }}" class="img-fluid" alt="">
                                <h6>Clean Ingredients</h6>
                            </li>
                            <li>
                                <img src="{{ asset('front/img/docter2.png') }}" class="img-fluid" alt="">
                                <h6>Efficacy</h6>
                            </li>
                            <li>
                                <img src="{{ asset('front/img/docter3.png') }}" class="img-fluid" alt="">
                                <h6>Doctor Formulated</h6>
                            </li>
                            <li>
                                <img src="{{ asset('front/img/docter4.png') }}" class="img-fluid" alt="">
                                <h6>Taste</h6>
                            </li>
                            <li>
                                <img src="{{ asset('front/img/docter5.png') }}" class="img-fluid" alt="">
                                <h6>Triple Tested</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="infused_wrapper p_m_120 mt-0" style="background-color: #f9ff0026;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text_width text-center">
                        <h4>Good Point's of CBD Infused Products</h4>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="infused_text">
                        <ul class="list-unstyled">
                            <li>
                                <h6>Pain Relief</h6>
                                <p>
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                </p>
                            </li>
                            <li>
                                <h6>Pain Relief</h6>
                                <p>
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                </p>
                            </li>
                            <li>
                                <h6>Pain Relief</h6>
                                <p>
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="infused_img">
                        <img src="{{ asset('front/img/infused_img.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="infused_text infused_right">
                        <ul class="list-unstyled">
                            <li>
                                <h6>Pain Relief</h6>
                                <p>
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                </p>
                            </li>
                            <li>
                                <h6>Pain Relief</h6>
                                <p>
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                </p>
                            </li>
                            <li>
                                <h6>Pain Relief</h6>
                                <p>
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="natural_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="natural_img_grid">
                        <div class="natural_img">
                            <img src="{{ asset('front/img/natural-img.png') }}" class="img-fluid" alt="" />
                        </div>
                        <div class="natural_imgbt">
                            <img src="{{ asset('front/img/natural-img1.png') }}" class="img-fluid" alt="" />
                            <img src="{{ asset('front/img/natural-img2.png') }}" class="img-fluid" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="heading_wreap">
                        <h4>Natural Flavour Broad Spectrum 30ml</h4>
                        <ul class="start_view list-unstyled">
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><i class="fa-solid fa-star"></i></li>
                            <li><span>1506 Reviews</span></li>
                        </ul>
                        <div class="purchase_wreap">
                            <h5>Purchase Type:</h5>
                            <form action="#">
                                <div class="purchase_hd">
                                    <input type="radio" id="test1" name="radio-group" checked />
                                    <label for="test1">
                                        <div>
                                            <h6>Subscribe And Save</h6>
                                            <p>
                                                Easy to cencel anytime,<br />
                                                Free Shipping alwasy
                                            </p>
                                        </div>
                                        <div class="purcha_text">
                                            <strong>$89.00</strong>
                                            <span>Per bottle</span>
                                        </div>
                                    </label>
                                </div>
                                <div class="purchase_hd">
                                    <input type="radio" id="test2" name="radio-group" />
                                    <label for="test2">
                                        <div>
                                            <h6>One Time</h6>
                                            <p>One time purchase</p>
                                        </div>
                                        <div class="purcha_text">
                                            <strong>$89.00</strong>
                                            <span>Per bottle</span>
                                        </div>
                                    </label>
                                </div>
                            </form>
                            <ul class="commitments_text list-unstyled">
                                <li><i class="fa-solid fa-check"></i> No Commitments</li>
                                <li><i class="fa-solid fa-check"></i> Skip Months</li>
                                <li><i class="fa-solid fa-check"></i> Cancel Anytime</li>
                            </ul>
                        </div>
                        <div class="strength_wreap">
                            <h5>Strength</h5>
                            <div class="radio-tile-group">
                                <div class="input-container">
                                    <input id="walk" class="radio-button" type="radio" name="radio" />
                                    <div class="radio-tile">
                                        <label for="walk" class="radio-tile-label">1000mg</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input id="bike" class="radio-button" type="radio" name="radio" />
                                    <div class="radio-tile">
                                        <label for="bike" class="radio-tile-label">1500mg</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input id="drive" class="radio-button" type="radio" name="radio" />
                                    <div class="radio-tile">
                                        <label for="drive" class="radio-tile-label">2000mg</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input id="fly" class="radio-button" type="radio" name="radio" />
                                    <div class="radio-tile">
                                        <label for="fly" class="radio-tile-label">3000mg</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input id="fly" class="radio-button" type="radio" name="radio" />
                                    <div class="radio-tile">
                                        <label for="fly" class="radio-tile-label">4000mg</label>
                                    </div>
                                </div>
                                <div class="input-container">
                                    <input id="fly" class="radio-button" type="radio" name="radio" />
                                    <div class="radio-tile">
                                        <label for="fly" class="radio-tile-label">5000mg</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sav_total">
                            <h6>You're saving $11.00</h6>
                            <p>Total: <span>$89.00</span></p>
                        </div>
                        <a href="#" class="main-btn">Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-sec crude_wrapper p_m_120" style="background-color: rgb(255 104 35 / 6%);">
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

    <section class="best-sec say_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading_wreap text_width">
                        <h4>So many ways to enjoy Crude</h4>
                    </div>
                    <div class="prod_wrapper">
                        @foreach ($categories as $category)
                         
                        <div class="best-box">
                            <div class="best-img">
                                <img  src="{{ asset('/category_images/'.$category->image) }}" alt="{{ $category->name }}" />
                            </div>
                            <div class="best-warp" style="background: #FFA500;">
                                <div class="best-text">
                                    <h6>{{ $category->name }}</h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading_wreap text-center">
                        <h4>General FAQ</h4>
                        <p>Here are some of the most commonly asked questions from our customers over the last few years.</p>
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
                            <div class="card">
                                <div class="card-header" id="faqhead6">
                                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq6" aria-expanded="false" aria-controls="faq6">Can I take CBD with Medications?</a>
                                </div>

                                <div id="faq6" class="collapse" aria-labelledby="faqhead6" data-parent="#faq">
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
    </section>


@endsection