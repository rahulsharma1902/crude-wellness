@extends('front_layout/master')
@section('content')
<section class="banner_wrapper p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner_content">
                        <div class="heading_wreap">
                            <h2>Shop</h2>
                            <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product tab section start here  -->
    <section class="product_tab_wrapper p_120 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_content">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-allproduct-tab" data-toggle="pill" href="#pills-allproduct" role="tab" aria-controls="pills-allproduct" aria-selected="true">{{ $category->name }}</a>
                            </li>
                            @foreach ($categories as $cat )
                            
                            <li class="nav-item">
                                {{-- <img class="card-img-top" src="{{ asset('/category_images/'.$category->image) }}" height="5px" width="5px"  alt="Card image cap"> --}}
                                <a class="nav-link" id="pills-capsules-tab" data-toggle="pill" href="{{ route('explorecategory',['id'=>$cat->id]) }}" role="tab" aria-controls="pills-capsules" aria-selected="false">{{ $cat->name }}</a>
                            </li>

                            @endforeach
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="pills-tinctures-tab" data-toggle="pill" href="#pills-tinctures" role="tab" aria-controls="pills-tinctures" aria-selected="false">Hemp Gummiess</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-gummies-tab" data-toggle="pill" href="#pills-gummies" role="tab" aria-controls="pills-gummies" aria-selected="false">Hemp Gummies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-topicals-tab" data-toggle="pill" href="#pills-topicals" role="tab" aria-controls="pills-topicals" aria-selected="false">Natural Oil</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product_wrapper p_120 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-allproduct" role="tabpanel" aria-labelledby="pills-allproduct-tab">
                            <div class="shop_wrapper_pro">
                                @foreach ($products as $product )
                                <div href="product-detail.html">
                                    <div class="card border-0">
                                        <div class="product_img">
                                            @foreach($product->media as $media)
                                            @endforeach
                                            <img class="card-img-top" src="{{ asset('/productIMG/'. $media->img_name ) }}" alt="Card image cap">
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
                                                @foreach($product->variations as $var)
                                                @endforeach
                                                <span class="prodollar">${{$var->price}}</span>
                                            </div>
                                            <h6 class="card-title">{{ $product->name }}</h6>
                                            <a  href="{{ route('shopdetails',['id'=>$product->id]) }}" type="button" class="btn main-btn  btn-lg btn-block">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-capsules" role="tabpanel" aria-labelledby="pills-capsules-tab">
                            <div class="shop_wrapper_pro">
                                <div href="product-detail.html">
                                    <div class="card border-0">
                                        <div class="product_img">
                                            <img class="card-img-top" src="{{ asset('/front/img/bestimg5.png') }}" alt="Card image cap">
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
                                            <a  href="product-detail.html" type="button" class="btn main-btn  btn-lg btn-block">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div href="product-detail.html">
                                    <div class="card border-0">
                                        <div class="product_img">
                                            <img class="card-img-top" src="{{ asset('/front/img/bestimg4.png') }}" alt="Card image cap">
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
                                            <a  href="product-detail.html" type="button" class="btn main-btn  btn-lg btn-block">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                               
                                <div href="product-detail.html">
                                    <div class="card border-0">
                                        <div class="product_img">
                                            <img class="card-img-top" src="{{ asset('/front/img/bestimg4.png') }}" alt="Card image cap">
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
                                            <a  href="product-detail.html" type="button" class="btn main-btn  btn-lg btn-block">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <div class="pro_navigation">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item arrow_wreap">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa-solid fa-chevron-left"></i></span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item arrow_wreap">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection