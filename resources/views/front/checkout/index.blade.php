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
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
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
                                                        <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="E-Mail" value="{{ auth()->user()->email ?? '' }}" />
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                                            <label class="form-check-label" for="exampleCheck3">  Keep me up to date with news, exclusive offers, & giveaways</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form class="address_form">
                                                    @csrf
                                                <div class="row border_bt border-0">
                                                    <div class="col-lg-12">
                                                        <h6>Shipping address</h6>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $address->id ?? '' }}">
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" name="country" placeholder="Country/Region" value="{{ $address->region ?? '' }}" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ $address->first_name ?? '' }}"/>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" name="last_name" placeholder="Last name" value="{{ $address->last_name ?? '' }}" />
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Address" value="{{ $address->address ?? '' }}" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" name="zipcodes" id="inputZip" placeholder="Zip Code" value="{{ $address->zipcodes ?? '' }}" />
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <select id="inputState" class="form-control" name="state">
                                                            <option @if(isset($address->state)) selected @endif>State</option>
                                                            <option @if(isset($address->state)) selected @endif>Austria</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" class="form-control" id="inputCity" placeholder="City" name="city" value="{{ $address->city ?? '' }}" />
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="number" class="form-control" id="number" placeholder="Phone number" name="phone" value="{{ $address->mobiles ?? '' }}" />
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
                                                                    <a href="{{ url('/') }}" class="conti_bank"><i class="fa-solid fa-chevron-left"></i> Continue to Cart</a>
                                                                </li>
                                                                <li class="text-right"><button type="button" class="main-btn default-btn next-step first-step">Continue to Shipping</button></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
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
                                                        <div class="summary" id="summary">
                                                            <dl>
                                                                <dt>Address:</dt>
                                                                <dd>{{ $address->address ?? '' }},{{ $address->city ?? '' }},{{ $address->state ?? '' }},{{ $address->zipcodes ?? '' }},{{ $address->region ?? '' }} </dd>
                                                            </dl>
                                                            <dl>
                                                                <dt>Contact information:</dt>
                                                                <dd>@if(auth()->check())   {{ auth()->user()->email ?? '' }}  @endif, {{ $address->mobiles ?? '' }}</dd>
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
                                                        <li><button type="button" class="main-btn default-btn next-step second-step">Continue to Payment</button></li>
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
                                            <form action="{{ url('paymentProcc') }}" method="post" id="payment-form">
                                                @csrf
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
                                                        
                                                        <div class="card-detail payment-option" id="card">
                                                            <div class="form-group">
                                                                <label for="cardnumber">Card Details</label>
                                                                <div id="card-elements"></div>
                                                                <div class="text text-danger mt-2" id="card-error-message"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row border-0 custom-mx">
                                                            <!-- <div class="col-lg-12 custom-px">
                                                                <input type="number" class="form-control" id="number" placeholder="Card Number" />
                                                            </div> -->
                                                      
                                                            <div class="col-lg-12 custom-px">
                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Name on Card" />
                                                            </div>
                                                            <!-- <div class="col-lg-6 custom-px">
                                                                <input type="number" class="form-control" id="number" placeholder="Expiration date (MM / YY)" />
                                                            </div>
                                                            <div class="col-lg-6 custom-px">
                                                                <input type="number" class="form-control" id="number" placeholder="Security code" />
                                                            </div> -->
                                                        </div>
                                                       
                                                    </div>
                                                    </form>
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
                                                            <li><button type="submit" class="main-btn default-btn next-step" data-secret="{{ $intent->client_secret }}" id="card-button">Place Your Order</button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
                        <?php
                        $totalcartprice = 0;
                        ?>
                        @foreach($cartitems as $cart)
                        <div class="order_wrapper">
                            <div class="d-flex">
                                <div class="order-img">
                                    <img src="{{ asset('productIMG') }}/{{ $cart->product['featured_img'] ?? '' }}" alt="" />
                                </div>
                                <div>
                                    <h5>{{ $cart->product->name ?? '' }}</h5>
                                </div>
                            </div>
                            <div class="add_wreap">
                                <?php 
                                $price = $cart->price;
                                $quantity = $cart->quantity;
                                $totalprice = $price*$quantity;
                                ?>
                                <span>${{ number_format($totalprice,2) }}</span>
                                <div class="number">
                                    <span action="decrease" class="minus change_quantity" cart-id="{{ $cart->id ?? '' }}">-</span>
                                    <input type="text"  class="cart_quantity" cart-id="{{ $cart->id ?? '' }}" value="{{ $cart->quantity ?? '' }}">
                                    <span action="increase" class="plus change_quantity" cart-id="{{ $cart->id ?? '' }}">+</span>
                                </div>
                            </div>
                        </div>
                        <?php
                        $totalcartprice += $totalprice;
                        ?>
                        @endforeach
                        
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
                                            <strong>$<?php echo number_format($totalcartprice,2); ?></strong>
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
                                            <span class="total_count_wreap">$<?php echo number_format($totalcartprice,2); ?></span>
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
                        console.log(response);
                        // $('span.cart_total_price').html(response.price);
                        // $('span.cart_items_count').html(response.total_items);
                        // if(response.count == 0){
                        //     $('.shoping_list').addClass('d-none');
                        // }
                    
                    }
                })
            });
        });

        //formsubmit

        $(document).ready(function(){
            $('.first-step').on('click',function(){
                   first_name = $('input[name="first_name"]').val();
                   last_name = $('input[name="last_name"]').val();
                   country = $('input[name="country"]').val();
                   address = $('input[name="address"]').val();
                   zipcodes = $('input[name="zipcodes"]').val();
                   city = $('input[name="city"]').val();
                   phone = $('input[name="phone"]').val();
                   state = $('select[name="state"]').val();
                   id=$('input[name="id"]').val();

                   $.ajax({
                    method:'post',
                    url: '{{ url('addresssave') }}',
                    data:{
                        _token:"{{ csrf_token() }}",
                        id:id,
                        first_name:first_name,
                        last_name:last_name,
                        country:country,
                        address:address,
                        zipcodes:zipcodes,
                        city:city,
                        phone:phone,
                        state:state
                    },
                    success: function(response){
                          var active = $(".wizard .nav-tabs li.active");
                            active.next().removeClass("disabled");
                            nextTab(active);
                            $("#summary").load(location.href + " #summary");
                    }
                   })
             
            });
        });
        $('.second-step').on('click',function(){
            var active = $(".wizard .nav-tabs li.active");
            active.next().removeClass("disabled");
            nextTab(active);

        });

    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <script>
    const stripe = Stripe('{{ env('STRIPE_PUBLIC_KEY') }}');
    // console.log(stripe);
    const elements= stripe.elements();
    const cardElement= elements.create('card');
    cardElement.mount('#card-elements');
    const cardBtn = document.getElementById('card-button');


    const form = document.getElementById('payment-form');
    cardBtn.addEventListener('click',function(){
      form.addEventListener('submit', async (e) => {
      
      const cardBtn = document.getElementById('card-button');
      const name = $('#name').val();
        console.log(cardBtn);
      const cardHolderName = name; 
          e.preventDefault()
      
          // cardBtn.disabled = true
          const { setupIntent, error } = await stripe.confirmCardSetup(
              cardBtn.dataset.secret, {
                  payment_method: {
                      card: cardElement,
                      billing_details: {
                          name: cardHolderName.value
                      }   
                  }
              }
          )
    
          if(error) {
              cardBtn.disable = false
              if(error.message != ''){
                $("#card-error-message").html(error.message);
              }
          } else {
              let token = document.createElement('input')
              token.setAttribute('type', 'hidden')
              token.setAttribute('name', 'token')
              token.setAttribute('value', setupIntent.payment_method)
              form.appendChild(token)
        
              form.submit();
          }
      });
    });
    // ajax 
    
  </script>
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