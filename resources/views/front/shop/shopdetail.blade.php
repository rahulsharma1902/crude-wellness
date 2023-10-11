@extends('front_layout/master')
@section('content')

<section class="breadcrumb_inner">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-12">  
                    <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
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
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                </p>
                                <p>
                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident,
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="information_cantent">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Ingredients" role="tabpanel" aria-labelledby="pills-Ingredients-tab">
                            <div class="information_cantent">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Results" role="tabpanel" aria-labelledby="pills-Results-tab">
                            <div class="information_cantent">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                </p>
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
    <section class="product_wrapper p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h4>You may also like</h4>
                    </div>
                    <div class="shop_wrapper_pro">
                        <div href="product-detail.html">
                            <div class="card border-0">
                                <div class="product_img">
                                    <img class="card-img-top" src="{{ asset('front/img/bestimg5.png') }}" alt="Card image cap">
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
                                        <span class="prodollar">$89.00</span>
                                    </div>
                                    <h6 class="card-title">Natural Flavour Broad Spectrum 30ml</h6>
                                    <a href="product-detail.html" type="button" class="btn main-btn  btn-lg btn-block">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div href="product-detail.html">
                            <div class="card border-0">
                                <div class="product_img">
                                    <img class="card-img-top" src="{{ asset('front/img/bestimg4.png') }}" alt="Card image cap">
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
                                        <span class="prodollar">$89.00</span>
                                    </div>
                                    <h6 class="card-title">Natural Flavour Broad Spectrum 30ml</h6>
                                    <a href="product-detail.html" type="button" class="btn main-btn  btn-lg btn-block">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div href="product-detail.html">
                            <div class="card border-0">
                                <div class="product_img">
                                    <img class="card-img-top" src="{{ asset('front/img/bestimg6.png') }}" alt="Card image cap">
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
                                        <span class="prodollar">$89.00</span>
                                    </div>
                                    <h6 class="card-title">Natural Flavour Broad Spectrum 30ml</h6>
                                    <a href="product-detail.html" type="button" class="btn main-btn  btn-lg btn-block">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div href="product-detail.html">
                            <div class="card border-0">
                                <div class="product_img">
                                    <img class="card-img-top" src="{{ asset('front/img/bestimg4.png') }}" alt="Card image cap">
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
                                        <span class="prodollar">$89.00</span>
                                    </div>
                                    <h6 class="card-title">Natural Flavour Broad Spectrum 30ml</h6>
                                    <a href="product-detail.html" type="button" class="btn main-btn  btn-lg btn-block">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection