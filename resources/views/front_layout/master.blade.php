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

    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <title>home page</title>
</head>
<body>
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
                    <img src="img/popup-bg-img.png" class="img-fluid" alt="">
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
                            <p>The Fall Sale Is Here! Get 15% Off Sitewide With Code </p>
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
                                        <a class="nav-link" href="#">Shop +</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">subscription</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Account</a>
                                    </li>
                                    <li class="nav-item ab_mb_show" style="display: none;">
                                        <a class="nav-link" href="#">About</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 brand-ord text-center">
                            <a class="navbar-brand" href="index.html">
                                <img src="img/site-logo.png" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="col-lg-4 brand-ord">
                            <div class="nav-icons">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link ab_mb" href="#">About</a>
                                    </li>
                                    <li><a href="#"> <img src="img/user.svg" class="img-fluid" alt=""></a></li>
                                    <li><button data-toggle="modal" data-target="#exampleModalLong"> <img src="img/cart.svg" class="img-fluid" alt=""><span>0</span>
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

    <footer class="footer_wrapper">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 b-left p-top">
                        <div class="footer-logo">
                            <img src="img/footer-toplogo.png" alt="">
                        </div>
                        <div class="social-links">
                            <ul>
                                <li>
                                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="address">
                            <ul>
                                <li><a href="mailto:support@crudewellness.com">support@crudewellness.com</a></li>
                                <li><a href="tel:414-296-9640">414-296-9640</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 p-top p-left">
                        <div class="quick-links">
                            <h6>Quick Links</h6>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="product-cbd-oil.html">Shop</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="FAQ.html">Review</a></li>
                                <li><a href="contact.html">Contact</a></li>
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
                                <li><a href="#">Our Story</a></li>
                                <li><a href="about.html">Education</a></li>
                                <li><a href="#">FAQ</a></li>
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
                                <img src="img/payment-img.png" alt="">
                            </div>
                            <p>© 2023 Crude Wellness. All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="foot-para">
                            <h6>Promise of Quality</h6>
                            <p>
                                This product is not for use by or sale to persons under the age of 18. This product should be used only as directed on the label. It should not be used if you are pregnant or nursing. Consult with a physician before use if you have a serious medical condition or use prescription medications. A doctor’s advice should be sought before using this and any supplemental dietary product. All trademarks and copyrights are the property of their respective owners, and they are not affiliated with, nor do they endorse these products. These statements have not been evaluated by the FDA. This product is not intended to diagnose, treat, cure or prevent any disease. By using this site, you agree to follow the Privacy Policy and all Terms & Conditions printed on this site. Void Where Prohibited by Law.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <button class="back_to_top">
        <i class="fa-solid fa-comments"></i>
    </button>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>

</body>
</html>
