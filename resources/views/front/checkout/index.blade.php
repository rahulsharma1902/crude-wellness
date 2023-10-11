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

    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}" />
    <title>checkout page</title>
</head>
<body>

    <section class="checkout_wrapper">
        <div class="main_wreap">
            <div class="left_side_wreap">
                <div class="checkout_content">
                    <div class="shipping_img">
                        <a href="{{ url('/') }}">
                        <img src="{{ asset('front/img/site-logo.png') }}" />
                        </a>
                        <a href="{{ url('shop') }}">
                            Continue shopping <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="bg_wrapper">
                        <div class="form_wrapper">
                            <div class="wizard">
                                <div class="wizard-inner">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"></a>
                                        </li>
                                        <li role="presentation" class="disabled">
                                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"></a>
                                        </li>
                                        <li role="presentation" class="disabled">
                                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"></a>
                                        </li>
                                    </ul>
                                </div>
                                <form role="form" action="index.html" class="login-box">
                                    <div class="tab-content" id="main_form">
                                        <div class="tab-pane active" role="tabpanel" id="step1">
                                            <div class="step_wrapper">
                                                <div class="form_wrapper border_bt">
                                                    <div class="contact_chout">
                                                        <h6>Contact </h6>
                                                        <input type="email" class="form-control" id="inputEmail4" placeholder="E-Mail" />
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                                            <label class="form-check-label" for="exampleCheck3">  Keep me up to date with news, exclusive offers, & giveaways</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row border_bt border-0">
                                                    <div class="col-lg-12">
                                                        <h6>Shipping address</h6>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" placeholder="Country/Region" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="First Name" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Last name" />
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" id="inputAddress" placeholder="Address" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" id="inputZip" placeholder="Zip Code" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <select id="inputState" class="form-control">
                                                            <option selected>State</option>
                                                            <option>Austria</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" id="inputCity" placeholder="Zip Code" />
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="number" class="form-control" id="number" placeholder="Phone number" />
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                                            <label class="form-check-label" for="exampleCheck2">
                                                                Save this information for next time
                                                            </label>
                                                        </div>
                                                        <div class="footer_pd">
                                                            <ul class="list-inline pull-right">
                                                                <li>
                                                                    <a href="#" class="conti_bank"><i class="fa-solid fa-chevron-left"></i> Continue to Cart</a>
                                                                </li>
                                                                <li class="text-right"><button type="button" class="main-btn default-btn next-step">Continue to Shipping</button></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="formHeader">
                                                <div>
                                                    <h2>Delivery</h2>
                                                </div>
                                                <div>
                                                    <h2>Payment</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step2">
                                            <div class="step_wrapper">
                                                <div class="form_wrapper border_bt">
                                                    <div class="shipping_hd">
                                                        <h6>Shipping address</h6>
                                                        <button type="button" class="main_btn2  prev-step">Edit</button>
                                                    </div>
                                                </div>
                                                <div class="inner border_bt">
                                                    <div class="SummaryComponent">
                                                        <div class="summary">
                                                            <dl>
                                                                <dt>Address:</dt>
                                                                <dd>Zabiro Vasemashkovat, 2089 Rockford Road Westborough, 01581, MA, India</dd>
                                                            </dl>
                                                            <dl>
                                                                <dt>Contact information:</dt>
                                                                <dd>zabirovasemashkovat@schule-breklum.de, 77463 34445</dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="step_wrapper">
                                                <div class="form_wrapper border_bt">
                                                    <div class="shipping_hd">
                                                        <h6>Delivery</h6>
                                                    </div>
                                                </div>
                                                <div class="border_bt text-right">
                                                    <ul class="list-inline pull-right justify-content-end">
                                                        <li><a href="#" class="conti_bank"><i class="fa-solid fa-chevron-left"></i>Continue to shipping</a></li>
                                                        <li><button type="button" class="main-btn default-btn next-step">Continue to Payment</button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="formHeader">
                                                <div>
                                                    <h2>Payment</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" role="tabpanel" id="step3">
                                            <div class="step_wrapper">
                                                <div class="form_wrapper border_bt">
                                                    <div class="shipping_hd">
                                                        <h6>Shipping address</h6>
                                                        <button  type="button" class="main_btn2 prev-step">Edit</button>
                                                    </div>
                                                </div>
                                                <div class="inner border_bt">
                                                    <div class="SummaryComponent">
                                                        <div class="summary">
                                                            <dl>
                                                                <dt>Address:</dt>
                                                                <dd>Zabiro Vasemashkovat, 2089 Rockford Road Westborough, 01581, MA, India</dd>
                                                            </dl>
                                                            <dl>
                                                                <dt>Contact information:</dt>
                                                                <dd>dzabirovasemashkovat@schule-breklum.de, 77463 34445</dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="step_wrapper">
                                                <div class="form_wrapper border_bt">
                                                    <div class="shipping_hd">
                                                        <h6>Delivery</h6>
                                                        <button type="button" class="main_btn2 prev-step">Edit</button>
                                                    </div>
                                                </div>
                                                <div class="border_bt text-right"></div>
                                            </div>
                                            <div class="step_wrapper">
                                                <div class="form_wrapper border_bt">
                                                    <div class="shipping_hd">
                                                        <h6>Payment</h6>
                                                    </div>
                                                </div>
                                                <div class="border_bt text-right">
                                                    <div class="paylatter_bg">
                                                        <div class="paylatter_wrapper">
                                                            <div>
                                                                <label class="radio_wreap">
                                                                    Credit card
                                                                    <input type="checkbox">
                                                                    <span class="checkmark active">
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <a href="#">
                                                                    <img src="{{ asset('front/img/card-pay.png') }}" alt="" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="row border-0 custom-mx">
                                                            <div class="col-lg-12 custom-px">
                                                                <input type="number" class="form-control" id="number" placeholder="Card Number" />
                                                            </div>
                                                            <div class="col-lg-12 custom-px">
                                                                <input type="number" class="form-control" id="number" placeholder="Name on Card" />
                                                            </div>
                                                            <div class="col-lg-6 custom-px">
                                                                <input type="number" class="form-control" id="number" placeholder="Expiration date (MM / YY)" />
                                                            </div>
                                                            <div class="col-lg-6 custom-px">
                                                                <input type="number" class="form-control" id="number" placeholder="Security code" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="boynow_wreap">
                                                        <label class="radio_wreap">
                                                            Buy Now, Pay Later with Sezzle
                                                            <input type="checkbox">
                                                            <span class="checkmark">
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="text-left billing_address">
                                                        <h4>Billing Address</h4>
                                                        <p>Select the address that matches your card or payment method.</p>
                                                    </div>
                                                    <div>
                                                        <label class="radio_wreap">
                                                            Same as shipping address
                                                            <input type="checkbox">
                                                            <span class="checkmark">
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="">
                                                        <label class="radio_wreap">
                                                            Use a different billing address
                                                            <input type="checkbox">
                                                            <span class="checkmark">
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="order_place">
                                                        <ul class="list-inline pull-right justify-content-end">
                                                            <li>
                                                                <a href="#" class="conti_bank"><i class="fa-solid fa-chevron-left"></i> Continue to shipping</a>
                                                            </li>
                                                            <li><button type="button" class="main-btn default-btn next-step">Place Your Order</button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right_side_wreap">
                <div class="checkout_content2">
                    <div class="rightside_content">
                        <h6>Order Summary</h6>
                        <div class="order_wrapper">
                            <div class="d-flex">
                                <div class="order-img">
                                    <img src="{{ asset('front/img/bestimg5.png') }}" alt="" />
                                </div>
                                <div>
                                    <h5>Natural Flavour Broad Spectrum 30ml</h5>
                                </div>
                            </div>
                            <div class="add_wreap">
                                <span>$89.00</span>
                                <div class="number">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>
                                </div>
                            </div>
                        </div>
                        <div class="order_wrapper">
                            <div class="d-flex">
                                <div class="order-img">
                                    <img src="{{ asset('front/img/cart-2.png') }}" alt="" />
                                </div>
                                <div>
                                    <h5>THE BEST OF Prio CBD 500mg</h5>
                                </div>
                            </div>
                            <div class="add_wreap">
                                <span>$89.00</span>
                                <div class="number">
                                    <span class="minus">-</span>
                                    <input type="text" value="1">
                                    <span class="plus">+</span>
                                </div>
                            </div>
                        </div>
                        <div class="total_wreap">
                            <div class="gift_apy">
                                <p>Gift Card or Discount Code</p>
                                <a href="#" class="btn main-btn">Apply</a>
                            </div>
                            <table class="total-line-table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table_tbody">
                                    <tr class="subtotal_wreap">
                                        <th>Subtotal</th>
                                        <td>
                                            <strong>$178.00</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <span>Shipping</span>
                                        </th>
                                        <td>
                                            <span>Free</span>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="table_footer">
                                    <tr class="total-line">
                                        <th class="grand_total">
                                            <span>Total</span>
                                        </th>
                                        <td class="grand_total">
                                            <span class="total_count_wreap">$178.00</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <button class="back_to_top">
        <i class="fa-solid fa-comments"></i>
    </button>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>

</body>
</html>