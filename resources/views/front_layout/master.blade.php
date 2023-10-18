<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">

    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <title>home page</title>
</head>
<body>
    @if(!Auth()->check())
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
    @endif
<?php 
    $sitemeta = App\Models\SiteMeta::first();
   
?>
 <?php
    if(auth()->check()){
        $user_id = Auth::user()->id;
    }else{
        $user_id = null;
    }
    $cart = App\Models\Cart::where('user_id',$user_id)->with('product','subscription','variations')->get();
    $subscriptions = App\Models\SubscriptionOption::where('status',1)->get();
    
    
    
    ?>
    <header>
        @if(isset($sitemeta->header_text))
        <div class="top-header">
            <div class="container">
                <div class="">
                    <div class="col-lg-12">
                        <div class="top_hd_text">
                            <p>The Fall Sale Is Here! Get 15% Off Sitewide With Code </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="site-header">
            <div class="container">
                <div class="header-nav">
                    <nav class="navbar navbar-expand-lg">
                        <div class="col-lg-4 nav-col">
                            <button class="navbar-toggler btn-ord" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                                        @if(auth()->check())
                                        <a class="nav-link" href="{{ url('account') }}">Account</a>
                                        @else
                                        <a class="nav-link" href="{{ url('login') }}">Account</a>
                                        @endif
                                    </li>
                                    <li class="nav-item ab_mb_show" style="display: none;">
                                        <a class="nav-link" href="{{ url('our-story') }}">About</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 brand-ord text-center">
                            <a class="navbar-brand" href="{{ url('/') ?? ''}}">

                                <img src="{{ asset('front/img/site-logo.png') ?? '' }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 brand-ord">
                            <div class="nav-icons">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link ab_mb" href="{{ url('our-story') }}">About</a>
                                    </li>
                                    <li>
                                        @if(auth()->check())
                                            <a href="{{ url('account') }}"> <img src="{{ asset('front/img/user.svg') ?? '' }}" class="img-fluid" alt=""></a>
                                        @else
                                            <a href="{{ url('login') }}"> <img src="{{ asset('front/img/user.svg') ?? '' }}" class="img-fluid" alt=""></a>
                                        @endif
                                    </li>
                                    <li><button data-toggle="modal" data-target="#exampleModalLong"> <img src="{{ asset('front/img/cart.svg') ?? '' }}" class="img-fluid" alt=""><span class="cart_items_count">{{ count($cart) ?? '0' }}</span>
                                    </button></li>
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
   

<div class="modal left fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Your Cart</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <div class="cart-products">
                <?php $total_cart_price = 0; ?>
                @if($cart->isEmpty())
                    <p class="cart_empty_text">Your cart is Empty </p>
                @endif
                @foreach($cart as $c)
                <?php $total_cart_price += $c->price*$c->quantity;   ?>
                <div class="cart_content" id="cart_content{{ $c->id ?? '' }}">
                    <a href="#">
                        <div class="pro_cart">
                            <img src="{{ asset('productIMG/') }}/{{ $c->product->featured_img ?? '' }}" alt="">
                        </div>
                        <div class="">
                            <input type="checkbox" class="membership_status" cart-id="{{ $c->id ?? '' }}" name="membership_plan" id="membership_status{{ $c->id ?? '' }}" @if($c->purchase_type == 'multi_time') checked @endif >
                        </div>
                    </a>
                    <div class="min_wreap">
                        <div class="text_wreap">
                            <h5>{{ $c->product->name ?? '' }}</h5>
                            <span>$<span class="item_price{{ $c->id ?? '' }}">{{ number_format($c->price,2) ?? '' }}</span></span>
                        </div>
                        <div class="number">
                            <span class="minus change_quantity" cart-id="{{ $c->id ?? '' }}" action="decrease">-</span>
                            <input type="text" class="cart_quantity" cart-id="{{ $c->id ?? '' }}" value="{{ $c->quantity ?? '' }}">
                            <span class="plus change_quantity" cart-id="{{ $c->id ?? '' }}" action="increase">+</span>
                        </div>
                        @if($c->purchase_type == 'multi_time')
                        <div class="membership_plan" id="membership_plan{{ $c->id ?? '' }}">
                        @else
                        <div class="membership_plan d-none" id="membership_plan{{ $c->id ?? '' }}">
                        @endif
                            <select name="subscription_id" id="subscription{{ $c->id ?? '' }}" cart-id="{{ $c->id ?? '' }}" class="form-control subscription_type">
                            
                               @foreach($subscriptions as $sub)
                                <option value="{{ $sub->id ?? '' }}" @if($sub->id == $c->subscription_id) selected  @endif>Delivery Every {{ $sub->recurring_period ?? '' }} {{ $sub->recurring_type ?? '' }} -{{ $sub->discount_percentage ?? '' }}% Off</option>
                               @endforeach
                            </select>
                        </div>
                       
                    </div>
                </div>
                @endforeach
                </div>
                <!-- <div class="might_wrapper">
                    <h3>You might also like</h3>
                    <div class="prolist_wrapper">
                        <div class="prolist_wreap">
                            <div class="card border-0">
                                <div class="product_img">
                                    <img class="card-img-top" src="{{ asset('front/img/cart-3.png') ?? '' }}" alt="Card image cap">
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
                                    <h5 class="card-title">THE BEST OF Prio CBD</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="modal-footer">
                @if($cart->isNotEmpty())
                <div class="shoping_list">
                @else
                <div class="shoping_list d-none">
                @endif
                    <ul class="list-unstyled">
                        <li>
                            <div>
                                <span>Total</span>
                                <p>Shipping & taxes calculated at checkout</p>
                            </div>
                            <span>$<span class="cart_total_price">{{ number_format($total_cart_price,2) ?? '' }}</span> </span>
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
                    <button type="button" onclick="location.href='{{ url('checkout') }}'" class="btn main-btn">Go to
                        checkout</button>
                </div>
               
            </div>
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
                                @if(isset($sitemeta->facebook))
                                <li>
                                    <a href="//{{ $sitemeta->facebook ?? '' }}"><i class="fa-brands fa-facebook"></i></a>
                                </li>
                                @endif
                                @if(isset($sitemeta->instagram))
                                <li>
                                    <a href="//{{ $sitemeta->instagram ?? '' }}"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                @endif
                                @if(isset($sitemeta->pintrest))
                                <li>
                                    <a href="//{{ $sitemeta->pintrest ?? '' }}"><i class="fa-brands fa-pinterest"></i></a>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="address">
                            <ul>
                               @if(isset($sitemeta->support_email)) <li><a href="mailto:{{ $sitemeta->support_email ?? '' }}">{{ $sitemeta->support_email ?? '' }}</a></li>@endif
                               @if(isset($sitemeta->support_phone))<li><a href="tel:{{ $sitemeta->support_phone ?? '' }}">{{ $sitemeta->support_phone ?? '' }}</a></li>@endif
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
                           @if(isset($sitemeta->footer_title)) <h6>{{ $sitemeta->footer_title ?? '' }}</h6>@endif
                            <?php if(isset($sitemeta->footer_text)){ echo $sitemeta->footer_text; }  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <button class="back_to_top">
        <i class="fa-solid fa-comments"></i>
    </button>
    <script>
        $(document).ready(function(){
            $("body").delegate(".change_quantity","click",function(){
                // console.log('done');
            // $('.change_quantity').click(function(){
                cart_id = $(this).attr('cart-id');
                action = $(this).attr('action');
                if(action == 'increase'){
                    quantity = parseInt($('.cart_quantity[cart-id="'+cart_id+'"]').val())+1;
                }else if(action == 'decrease'){
                    quantity = parseInt($('.cart_quantity[cart-id="'+cart_id+'"]').val())-1;
                }
                if(quantity === 0){
                    $('#cart_content'+cart_id).remove();
                   
                }
                
                $.ajax({
                    method: 'post',
                    url: '{{ url('cart/update') }}',
                    data: { quantity:quantity,cart_id:cart_id,_token:"{{ csrf_token() }}" },
                    success: function(response){
                        $('span.cart_total_price').html(response.price);
                        $('span.cart_items_count').html(response.total_items);
                        if(response.count == 0){
                            $('.shoping_list').addClass('d-none');
                        }
                    
                    }
                })
            });
        });
        $("body").delegate(".membership_status","change",function(){
            cart_id = parseInt($(this).attr('cart-id'));
            if($(this).prop('checked') == true){
                purchase_type = 'multi_time';
            }else{
                purchase_type = 'one_time';
            }
            $.ajax({
                    method: 'post',
                    url: '{{ url('cart/update') }}',
                    data: { action:'purchase_type', purchase_type:purchase_type,cart_id:cart_id,_token:"{{ csrf_token() }}" },
                    success: function(response){
                        $('span.cart_total_price').html(response.total_price);
                        $('span.item_price'+cart_id).html(response.item_price);
                       if(response.cart.purchase_type == 'one_time'){
                            $('div#membership_plan'+cart_id).addClass('d-none');   
                       }else{
                            $('div#membership_plan'+cart_id).removeClass('d-none');
                       }
                    }
                })
        });
        $("body").delegate(".subscription_type","change",function(){
            subscriptionid = $(this).val();
            cart_id = $(this).attr('cart-id');
            $.ajax({
                    method: 'post',
                    url: '{{ url('cart/update') }}',
                    data: { action:'change_plan', subscriptionid:subscriptionid,cart_id:cart_id,_token:"{{ csrf_token() }}" },
                    success: function(response){
                        $('span.cart_total_price').html(response.total_price);
                        $('span.item_price'+cart_id).html(response.item_price);
                    }
                });
        });

    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    
    <script src="{{ asset('front/js/script.js') }}"></script>

    @if(Session::get('error'))
    <script>
        iziToast.error({
            message: "{{ Session::get('error') }}",
            position: 'topRight' 
        });
        </script>
    @endif
    @if(Session::get('success'))
    <script>
        iziToast.success({
            message: "{{ Session::get('success') }}",
            position: 'topRight' 
        });
    </script>
    @endif
</body>
</html>
