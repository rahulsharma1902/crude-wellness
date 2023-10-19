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
                                    <a class="nav-link active" id="pills-allproduct-tab" data-toggle="pill"
                                        href="#pills-allproduct" role="tab" aria-controls="pills-allproduct"
                                        aria-selected="true">All</a>
                                </li>
                                @foreach ($categories as $category)
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                            href="#{{ $category->name }}" role="tab" aria-controls="pills-profile"
                                            aria-selected="false">{{ $category->name }}</a>
                                    </li>
                                @endforeach
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
                        <div class="tab-pane fade show active" id="pills-allproduct" role="tabpanel"
                            aria-labelledby="pills-allproduct-tab">
                            <div class="shop_wrapper_pro">
                                @foreach ($products as $product)
                                    <div href="product-detail.html">
                                        <div class="card border-0">
                                            <div class="product_img">
                                                @foreach ($product->media as $media)
                                                @endforeach
                                                <img class="card-img-top"
                                                    src="{{ asset('/productIMG/' . $media->img_name) }}"
                                                    alt="Card image cap">
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
                                                    @foreach ($product->variations as $var)
                                                    @endforeach
                                                    <span class="prodollar">${{ $var->price }}</span>
                                                </div>
                                                <h6 class="card-title">{{ $product->name }}</h6>
                                                <a href="{{ route('shopdetails', ['id' => $product->id]) }}"
                                                    type="button" class="btn main-btn  btn-lg btn-block">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @foreach ($categories as $category)
                 <div class="tab-pane fade" id="{{ $category->name }}" role="tabpanel"
                                aria-labelledby="pills-capsules-tab">
                
                                <div class="shop_wrapper_pro">
                                    <span style="display: none">
                                        {{ $product = DB::table('products')->where('category_id', $category->id)->get() }}
                                    </span>
                                    @foreach ($product as $p)
                                        <div href="product-detail.html">
                                            <div class="card border-0">
                                                <span style="display: none">
                                                    {{ $image = DB::table('media')->where('product_id', $p->id)->get() }}
                                                </span>
                                                @foreach ($image as $img)
                                                @endforeach
                                                <div class="product_img">
                                                    <img class="card-img-top"
                                                        src="{{ asset('/productIMG/' . $img->img_name) }}"
                                                        alt="Card image cap">
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
                                                        <span style="display: none">
                                                            {{ $var = DB::table('product_variations')->where('product_id', $p->id)->get() }}
                                                        </span>
                                                        @foreach ($var as $v)
                                                        @endforeach
                                                        <span class="prodollar">${{ $v->price }}</span>

                                                    </div>
                                                    <h6 class="card-title">{{ $p->name }}</h6>
                                                    <a href="{{ route('shopdetails', ['id' => $p->id]) }}" type="button"
                                                        class="btn main-btn  btn-lg btn-block">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <div class="pro_navigation">
                            <nav aria-label="Page navigation example">
                                 {{-- {{ $products->links('pagination::simple-bootstrap-4') }}  --}}
                                <ul class="pagination">
                                    @if($products->onFirstPage())
                                    @if($products->HasmorePages())
                                    <li class="page-item arrow_wreap">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
                                        </a>
                                    </li>
                                    @else
                                    @endif
                                    @elseif($products->HasMorePages())
                                    <li class="page-item arrow_wreap">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true"><i class="fa-solid fa-chevron-left"></i></span>
                                        </a>
                                    </li>
                                    <li class="page-item arrow_wreap">
                                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
                                        </a>
                                    </li>
                                    @else
                                    <li class="page-item arrow_wreap">
                                        <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true"><i class="fa-solid fa-chevron-left"></i></span>
                                        </a>
                                    </li>
                                    {{-- @else --}}
                                    @endif
                                    {{-- <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
                                    {{-- <li class="page-item"><a class="page-link" href=""></a></li> --}}
                                    {{--<li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item arrow_wreap">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="fa-solid fa-chevron-right"></i></span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
