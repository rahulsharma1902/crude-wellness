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
                        @if($blog->isNotEmpty())
                        @foreach($blog as $b)
                        <div class="best-box">
                            <div class="best-img">
                                <img src="{{ asset('blog_images') }}/{{ $b->image ?? '' }}" alt="" />
                            </div>
                            <div class="best-warp">
                                <div class="best-text">
                                    <a href="{{ url('education-details/'.$b->slug) }}"><h6>{{ $b->title ?? '' }}</h6></a>
                                  
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
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
                @foreach($review_category->reviews as $review)
                <div class="testimonial-list">
                    <div class="testimonial-para">
                        <div class="test_view">
                            <div class="test_img">
                                <img src="{{ asset('reviewsIMG') }}/{{ $review->image ?? '' }}" class="img-fluid" alt="">
                            </div>
                            <div class="test_hd">
                                <h6>{{ $review->review_by ?? '' }}</h6>
                                <span>{{ $review->position ?? '' }}</span>
                            </div>
                        </div>
                        <p>
                            “{{ $review->text ?? '' }}”
                        </p>
                    </div>
                </div>
                @endforeach
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
@if(isset($product))
    <section class="natural_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="natural_img_grid">
                        <!-- <div class="natural_img">
                            <img src="{{ asset('productIMG') }}/{{ $product->featured_img ?? '' }}" class="img-fluid" alt="" />
                        </div> -->
                        <div class="slider slider-for">
                        <div class="store-img">
                                <img src="{{ asset('productIMG') }}/{{ $product->featured_img ?? '' }}" class="img-fluid" alt="" />
                        </div>
                        @if(isset($product->media))
                            @foreach($product->media as $media)
                            <div class="store-img">
                              <img src="{{ asset('productIMG') }}/{{ $media->img_name ?? '' }}" class="img-fluid" alt="">
                            </div>
                            @endforeach
                        @endif
                        </div>
                        <div class="slider slider-nav">
                        <div class="store-img">
                                <img src="{{ asset('productIMG') }}/{{ $product->featured_img ?? '' }}" class="img-fluid" alt="" />
                        </div>
                        @if(isset($product->media))
                                @foreach($product->media as $media)
                             <div class="custom-img">
                                <img src="{{ asset('productIMG') }}/{{ $media->img_name ?? '' }}" alt="">
                              </div>  
                            @endforeach
                        @endif
                        </div>
                        <div class="natural_imgbt">
                            <?php $count = 0; ?>
                    
                            <!-- @if(isset($product->media))
                                @foreach($product->media as $media)
                                <?php $count = $count+1;  ?>
                                    <img src="{{ asset('productIMG') }}/{{ $media->img_name ?? '' }}" class="img-fluid" alt="" />
                              
                                @endforeach
                            @endif -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                <form method="post" action="{{ url('shop/addCart') }}" id="cartForm" >
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id ?? '' }}">
                    <div class="heading_wreap">
                        <h4>{{ $product->name ?? '' }}</h4>
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
                           
                                @if($subscriptions->isNotEmpty())
                                <div class="purchase_hd">
                                    <input type="radio" id="test1" name="purchase_type" value="multi_time"  checked="true"/>
                                    <label for="test1">
                                        <div>
                                            <h6>Subscribe And Save</h6>
                                            <select name="subscription_plan" class="form-control" id="">
                                                @foreach($subscriptions as $option)
                                                 <option value="{{ $option->id ?? '' }}">Delivery Every {{ $option->recurring_period ?? '' }} {{ $option->recurring_type ?? '' }} -{{ $option->discount_percentage ?? '' }}% Off</option>
                                                @endforeach
                                            </select>
                                            <p>
                                                Easy to cancel anytime,<br />
                                                Free Shipping always
                                            </p>
                                        </div>
                                        <?php 
                                            $percentage_off = $subscriptions[0]->discount_percentage;
                                            $price = number_format($product->variations[0]->price,2);
                                            $discount = ($percentage_off/100)*$price;
                                            $final_price = $price - $discount;

                                        ?>
                                        <div class="purcha_text">
                                            <strong>$<span class="multi_time_price">{{ $final_price ?? '' }}</span></strong>
                                            <span>Per bottle</span>
                                        </div>
                                    </label>
                                </div>
                                @endif
                                <div class="purchase_hd">
                                    <input type="radio" id="test2" name="purchase_type" value="one_time" />
                                    <label for="test2">
                                        <div>
                                            <h6>One Time</h6>
                                            <p>One time purchase</p>
                                        </div>
                                        <div class="purcha_text">
                                            <strong>$<span class="one_time_price">{{ number_format($product->variations[0]->price,2) ?? '' }}</span></strong>
                                            <span>Per bottle</span>
                                        </div>
                                    </label>
                                </div>
                           
                            <ul class="commitments_text list-unstyled">
                                <li><i class="fa-solid fa-check"></i> No Commitments</li>
                                <li><i class="fa-solid fa-check"></i> Skip Months</li>
                                <li><i class="fa-solid fa-check"></i> Cancel Anytime</li>
                            </ul>
                        </div>
                        <div class="strength_wreap">
                            <h5>Strength</h5>
                            <div class="radio-tile-group">
                                <?php
                                $n = true;
                                ?>
                                @foreach($product->variations as $variation)
                                <div class="input-container">
                                    <input id="walk" class="radio-button" type="radio" name="variation" value="{{ $variation->id ?? '' }}" @if($n == true) checked @endif />
                                    <div class="radio-tile">
                                        <label for="walk" class="radio-tile-label">{{ $variation->strength }}mg</label>
                                    </div>
                                </div>
                                <?php $n = false; ?>
                                @endforeach
                            </div>
                        </div>
                        <div class="sav_total">
                            <h6 class="total_saving">You're saving ${{ number_format($discount,2) ?? '' }}</h6>
                            <p>Total: <span>$<span class="total_price">{{ number_format($final_price,2) ?? '' }}</span></span></p>
                        </div>
                        <button type="submit" class="main-btn">Add To Cart</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endif
    <section class="testimonial-sec crude_wrapper p_m_120" style="background-color: rgb(255 104 35 / 6%);">
        <div class="container">
            <div class="heading_wreap">
                <h4>What people are saying about Crude</h4>
            </div>
            <div class="testimonial-slider">
                @foreach($customers_reviews as $review)
                <div class="testimonial-list">
                    <div class="testimonial-para">
                        <div class="test_view">
                            <div class="test_img">
                                <img src="{{ asset('reviewsIMG') }}/{{ $review->image ?? '' }}" class="img-fluid" alt="">
                            </div>
                            <div class="test_hd">
                                <h6>{{ $review->review_by ?? '' }}</h6>
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
                            “{{ $review->text ?? '' }}”
                        </p>
                    </div>
                </div>
                @endforeach
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
                        @foreach($categories as $cat)
                        <div class="best-box">
                            <div class="best-img">
                                <img src="{{ asset('category_images') }}/{{ $cat->image ?? '' }}" alt="" />
                            </div>
                            <div class="best-warp" style="background: #FFA500;">
                            <a href="{{ url('shop/'.$cat->slug) }}">
                                <div class="best-text">
                                    <h6>{{ $cat->name ?? '' }}</h6>
                                </div>
                            </a>
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
                            @if($faqs)
                            @if(isset($faqs->questions) || isset($faqs->answers))
                            <?php 
                            $questions = json_decode($faqs->questions);
                            $answers = json_decode($faqs->answers);
                            for ($i=0; $i < count($questions); $i++) { 
                            ?>
                            <div class="card">
                                <div class="card-header" id="faqhead1">
                                    <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq{{ $i }}" aria-expanded="false" aria-controls="faq1">{{ $questions[$i] ?? '' }}</a>
                                </div>

                                <div id="faq{{ $i }}" class="collapse @if($i == 0) show @endif" aria-labelledby="faqhead1" data-parent="#faq">
                                    <div class="card-body">
                                        <p>
                                            {{ $answers[$i] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            @endif
                                @if($faqs->text)
                                <div>
                                    <?php 
                                    print_r($faqs->text);
                                    ?>
                                </div>
                                @endif
                           @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection