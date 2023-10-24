<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">

    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">

    <title>home page</title>
</head>

<body>
    <?php
    $meta_data = App\Models\SiteMeta::class::first();
    // dd($meta_data);    
    ?>
    <div class='popup-onload'>
        <div class="pop_onload_wreap">
            <div class='cnt223'>
                <form>
                    <h4>Welcome to Crude</h4>
                    <p>Get 15% off your first order</p>
                    <input type="email" class="form-control" placeholder="Email">
                    <a href="#" class="main-btn">Get My Discount</a>
                    <p>(We respect your inbox. 1-click unsubscribe any time)</p>
                </form>
                <div class="popup_bg_img">
                    <img src="{{ asset('/front/img/popup-bg-img.png') }}" class="img-fluid" alt="">
                </div>
                <div class=close_onload>
                    <a href='#'>×</a>
                </div>
            </div>
        </div>
    </div>

    <header>
        <div class="top-header">
            <div class="container">
                <div class="">
                    <div class="col-lg-12">
                        <div class="top_hd_text">
                            <p> <?php echo $meta_data->header_text; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-header">
            <div class="container">
                <div class="header-nav">
                    <nav class="navbar navbar-expand-lg">
                        <div class="col-lg-4 nav-col">
                            <button class="navbar-toggler btn-ord" type="button" data-toggle="collapse"
                                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <div class="ham">
                                    <div class="bars bar1"></div>
                                    <div class="bars bar2"></div>
                                    <div class="bars bar3"></div>
                                </div>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ url('shop') }}">Shop +</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('subscription') }}">subscription</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('login') }}">Account</a>
                                    </li>
                                    <li class="nav-item ab_mb_show" style="display: none;">
                                        <a class="nav-link" href="{{ url('our-story') }}">About</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 brand-ord text-center">
                            <a class="navbar-brand" href="{{ url('/') ?? '' }}">

                                <img src="{{ asset('front/img/site-logo.png') ?? '' }}" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 brand-ord">
                            <div class="nav-icons">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link ab_mb" href="{{ url('our-story') }}">About</a>
                                    </li>

                                    @if (Auth::check())
                                        <li>
                                            <a href="{{ url('login') }}"> <img
                                                    src="{{ asset('front/img/user.svg') ?? '' }}" class="img-fluid"
                                                    alt=""></a>
                                            {{ Auth::user()->name }}
                                        </li>
                                        <?php $carts = App\Models\Cart::class::where('user_id',Auth::user()->id)->get(); ?>
                                        @if (!$carts)
                                            <li><button data-toggle="modal" data-target="#gotocart"> <img
                                                        src="{{ asset('front/img/cart.svg') ?? '' }}"
                                                        class="img-fluid" alt=""><span>0</span>
                                                </button></li>
                                        @else
                                            <li><button data-toggle="modal" data-target="#gotocart"> <img
                                                        src="{{ asset('front/img/cart.svg') ?? '' }}"
                                                        class="img-fluid"
                                                        alt=""><span>{{ $carts->count() }}</span>
                                                </button></li>
                                        @endif
                                        <li> <a class="btn btn-dark" href="{{ url('logout') }}"> logout</a></li>
                                    @else
                                        <a href="{{ url('login') }}"> <img
                                                src="{{ asset('front/img/user.svg') ?? '' }}" class="img-fluid"
                                                alt=""></a>
                                        <li><a href="{{ url('login') }}"> <img
                                                    src="{{ asset('front/img/cart.svg') ?? '' }}" class="img-fluid"
                                                    alt=""><span>0</span>
                                            </a></li>


                                    @endif
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    @yield('content')
    <!-- cart  -->



    <div class="modal left fade" id="gotocart" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Your Cart</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if (Auth::check())
                    <?php  $carts = App\Models\Cart::class::where('user_id',Auth::user()->id)->get(); ?>
                    <div class="modal-body">
                        <div class="cart_content" style="display: none" id="cartDIV">
                            <a href="#">
                                <div id="productIMG" class="pro_cart">
                                  
                                </div>
                            </a>
                            <div class="min_wreap">
                                <div class="text_wreap">
                                    <h5 id="productname"></h5>
                                   
                                    <span id="productprice">$</span>
                                </div>
                                <div class="number">
                                    <span class="minus"><button class="deletebtn"
                                            data-id="">-</button></span>
                                    <input type="text" id="qty" readonly
                                        value="1">
                                    <button class="updatebtn" data-id="">+</button>
                                </div>
                            </div>
                        </div>
                        
                        @if ($carts->isEmpty())
                        @else
                            @foreach ($carts as $cart) 
                                <?php   $product = App\Models\Products::class::find($cart->product_id); ?>
                                <?php $media = App\Models\Media::class::where('product_id',$cart->product_id)->first(); ?>

                                <div class="cart_content">
                                    <a href="#">
                                        <div class="pro_cart">
                                            <img src="{{ asset('/productIMG/' . $media->img_name) ?? '' }}"
                                                alt="">
                                        </div>
                                    </a>
                                    <div class="min_wreap">
                                        <div class="text_wreap">
                                            <h5>{{ $product->name }}</h5>
                                            <?php $total[] = $cart->total_price * $cart->qty;
                                            ?>
                                            <span>${{ $cart->total_price * $cart->qty }}</span>
                                        </div>
                                        <div class="number">
                                            <span class="minus"><button class="deletebtn"
                                                    data-id="{{ $cart->id }}">-</button></span>
                                            <input type="text" id="qty" readonly
                                                value="{{ $cart->qty }}">
                                            <button class="updatebtn" data-id="{{ $cart->id }}">+</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                            <div class="might_wrapper">
                                <h3>You might also like</h3>

                                <div class="prolist_wrapper">

                                    <?php  $products=App\Models\Products::Class::latest()->take(5)->get(); ?>

                                    @foreach ($products as $product)
                                        <?php   $m=App\Models\Media::Class::where('product_id',$product->id)->first(); ?>
                                        <?php $v=App\Models\ProductVariations::Class::where('product_id',$product->id)->first(); ?>

                                        <div class="prolist_wreap">
                                            <div class="card border-0">
                                                <div class="product_img">
                                                    <img class="card-img-top"
                                                        src="{{ asset('/productIMG/' . $m->img_name) ?? '' }}"
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
                                                        <span class="prodollar">${{ $v->price }}</span>
                                                    </div>
                                                    <h5 class="card-title">{{ $product->name }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        
                    </div>
                  
                  
                 <div class="modal-footer">
                        <div class="shoping_list">
                            <ul class="list-unstyled">
                                <li>
                                    <div>
                                        <span>Total</span>
                                        <p>Shipping & taxes calculated at checkout</p>
                                    </div>
                                    @if($carts->isEmpty())
                                    @else
                                    <span>$ {{ array_sum($total) }}</span>
                                    @endif
                                </li>
                                <li>
                                    <select id="inputState" class="form-control">
                                        <option selected>Select Redeem Points</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                    <a href="product-detail.html" type="button" class="btn main-btn">Apply</a>
                                </li>
                            </ul>
                            <button type="button" onclick="location.href='{{ url('checkout') }}'"
                                class="btn main-btn">Go to
                                checkout</button>
                        </div>
                        
                    </div>
           
                    @endif
                
            </div>
        </div>
    </div>

    <!-- end cart -->

    <footer class="footer_wrapper">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 b-left p-top">
                        <div class="footer-logo">
                            <img src="{{ asset('front/img/footer-toplogo.png') ?? '' }}" alt="">
                        </div>
                        <div class="social-links">
                            <ul>
                                <li>
                                    <a href="{{ $meta_data->facebook }}"><i class="fa-brands fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $meta_data->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $meta_data->pintrset }}"><i class="fa-brands fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="address">
                            <ul>
                                <li><a href="mailto:support@crudewellness.com">{{ $meta_data->support_email }}</a>
                                </li>
                                <li><a href="tel:414-296-9640">{{ $meta_data->support_phone }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 p-top p-left">
                        <div class="quick-links">
                            <h6>Quick Links</h6>
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('shop') }}">Shop</a></li>
                                <li><a href="{{ url('education') }}">Blog</a></li>
                                <li><a href="{{ url('review') }}">Review</a></li>
                                <li><a href="{{ url('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 p-top">
                        <div class="legal-links">
                            <h6>Legal Links</h6>
                            <ul>
                                <li><a href="#">Account</a></li>
                                <li><a href="terms.html">Shipping & Terms </a></li>
                                <li><a href="about.html">Cookies</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 p-top">
                        <div class="legal-links">
                            <h6>About</h6>
                            <ul>
                                <li><a href="{{ url('our-story') }}">Our Story</a></li>
                                <li><a href="{{ url('education') }}">Education</a></li>
                                <li><a href="{{ url('faq') }}">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="payment">
                            <span>Payment</span>
                            <div class="payemt-img">
                                <img src="{{ asset('front/img/payment-img.png') ?? '' }}" alt="">
                            </div>
                            <p>© 2023 Crude Wellness. All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="foot-para">
                            <h6>{{ $meta_data->footer_title }}</h6>
                            <p><?php echo $meta_data->footer_text; ?> </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <button class="back_to_top">
        <i class="fa-solid fa-comments"></i>
    </button>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
    {{-- // add to cart function --}}
    <script>
        // add qty function
        $(document).ready(function() {

            $('.updatebtn').click(function(e) {
                e.preventDefault();
                // const cartproduct =  document.getElementById('cart_content');
                var productId = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: '{{ url('updateCart') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: productId,


                    },
                    dataType: 'json',
                    success: function(response) {
                        if(response.msg1){

                            $(this).remove();
                        }else{
                        document.getElementById('qty').value = response.msg;
                    }},
                    error: function(xhr, status, error) {
                        console.log('Error:', xhr, status, error);
                    }
                });
            });
        });

        // delete qty function
        $(document).ready(function() {

            $('.deletebtn').click(function(e) {
                e.preventDefault();
                // const cartproduct =  document.getElementById('cart_content');
                var productId = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: '{{ url('delCart') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: productId,


                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.msg) {

                            document.getElementById('qty').value = response.msg;
                        } else {

                        }

                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', xhr, status, error);
                    }
                });
            });
        });
    </script>
    @if (Session::get('error'))
        <script>
            iziToast.error({
                message: "{{ Session::get('error') }}",
                position: 'topRight'
            });
        </script>
    @endif
    @if (Session::get('success'))
        <script>
            iziToast.success({
                message: "{{ Session::get('success') }}",
                position: 'topRight'
            });
        </script>
    @endif
</body>

</html>
