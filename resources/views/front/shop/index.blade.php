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
                        @if($categories->isNotEmpty())
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if($slug == null) active @endif" id="pills-allproduct-tab"  href="{{ url('shop') }}" role="tab" aria-controls="pills-allproduct" aria-selected="true">All</a>
                            </li>
                            @foreach($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link @if($category->slug == $slug) active @endif" id="pills-capsules-tab" href="{{ url('shop') }}/{{ $category->slug ?? '' }}" role="tab" aria-controls="pills-capsules" aria-selected="false">{{ $category->name ?? '' }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
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
                                @foreach($products as $product)
                                <div href="{{ url('shop-detail') }}/{{ $product->slug ?? '' }}">
                                    <div class="card border-0">
                                        <div class="product_img">
                                            <img class="card-img-top" src="{{ asset('productIMG') }}/{{ $product->featured_img ?? '' }}" alt="Card image cap">
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
                                                
                                                <span class="prodollar">${{ number_format($product->variations[0]->price,2) ?? '0.00' }}</span>
                                            </div>
                                            <h6 class="card-title">{{ $product->name ?? '' }}</h6>
                                            <a  href="{{ url('shop-detail') }}/{{ $product->slug ?? '' }}" type="button" class="btn main-btn  btn-lg btn-block">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if ($products->hasPages())
                    <div class="pro_navigation">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                               
                                <li class="page-item arrow_wreap">
                                @if($products->previousPageUrl() !== null)
                                    <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fa-solid fa-chevron-left"></i></span>
                                    </a>
                                @else
                                    <a class="page-link" aria-label="Previous" disabled>
                                        <span aria-hidden="true"><i class="fa-solid fa-chevron-left"></i></span>
                                    </a>
                                @endif
                                </li><?php  
                                $num = 0;
                                ?>                                
                                @for($i = $products->currentPage(); $i <= $products->total(); $i++)
                                <?php 
                                $num = $num+1;
                                ?>
                                @if($num < 5)
                                <li class="page-item active"><a class="page-link" href="?page={{ $i }}">{{ $i }}</a></li>
                                @endif
                                @endfor
                                <li class="page-item arrow_wreap">
                                    @if($products->nextPageUrl() !== null)
                                    <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                        <span aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
                                    </a>
                                    @else
                                    <a class="page-link" aria-label="Next" Disabled>
                                        <span aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
                                    </a>
                                    @endif
                                </li>
                            </ul>
                        </nav>
                    </div>
                    @endif
                    @if($products->isEmpty())
                    <h2 class="text-center">No Products found</h2>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection