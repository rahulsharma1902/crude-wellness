@extends('front_layout/master')
@section('content')

<section class="breadcrumb_inner">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-12">  
                    <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('shop') }}">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Natural Flavour Broad Spectrum 30ml</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

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
                                            $price = $product->variations[0]->price;
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
                        @if($subscriptions->isNotEmpty())
                            <h6 class="total_saving">You're saving ${{ number_format($discount,2) ?? '' }}</h6>
                            <p>Total: <span>$<span class="total_price">{{ number_format($final_price,2) ?? '' }}</span></span></p>
                        @endif
                        </div>
                        <button type="submit" class="main-btn">Add To Cart</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Information section start here  -->
    <section class="information_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Directions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-Ingredients-tab" data-toggle="pill" href="#pills-Ingredients" role="tab" aria-controls="pills-Ingredients" aria-selected="false">Ingredients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-Results-tab" data-toggle="pill" href="#pills-Results" role="tab" aria-controls="pills-Results" aria-selected="false">Lab Results</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-Reviews-tab" data-toggle="pill" href="#pills-Reviews" role="tab" aria-controls="pills-Reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="information_cantent">
                               <?php if(isset($product->description)){ echo $product->description;  } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="information_cantent">
                                <?php if(isset($product->direction)){ echo $product->direction; } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Ingredients" role="tabpanel" aria-labelledby="pills-Ingredients-tab">
                            <div class="information_cantent">
                               <?php if(isset($product->ingredients)){ echo $product->ingredients; } ?> 
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Results" role="tabpanel" aria-labelledby="pills-Results-tab">
                            <div class="information_cantent">
                                <?php if(isset($product->lab_results)){ echo $product->lab_results; }  ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Reviews" role="tabpanel" aria-labelledby="pills-Reviews-tab">
                            <div class="information_cantent">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Information section end here  -->

    <!-- Recommended for you section start here  -->
    @if($related_products->isNotEmpty())
    <section class="product_wrapper p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h4>You may also like</h4>
                    </div>
                    @foreach($related_products as $products)
                    <div class="shop_wrapper_pro">
                        <div href="product-detail.html">
                            <div class="card border-0">
                                <div class="product_img">
                                    <img class="card-img-top" src="{{ asset('productIMG') }}/{{ $products->featured_img ?? '' }}" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <div class="price">    
                                        <ul class="d-flex list-unstyled">
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li><i class="fa-solid fa-star"></i></li>
                                            <li>4.5</li>
                                        </ul>
                                        <span class="prodollar">${{ number_format($products->variations[0]->price,2) ?? '' }}</span>
                                    </div>
                                    <h6 class="card-title">{{ $products->name ?? '' }}</h6>
                                    <a href="{{ url('shop-detail') }}/{{ $products->slug ?? '' }}" type="button" class="btn main-btn  btn-lg btn-block">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</section>
    @endif

@endsection