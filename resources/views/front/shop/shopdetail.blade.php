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
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->slug }}</li>
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
                            @foreach ($product->media as $media)
                            @endforeach
                            <img src="{{ asset('/productIMG/' . $media->img_name) }}" class="img-fluid" alt=""
                                height="300px" width="300px" />
                        </div>

                        <div class="natural_imgbt">
                            @foreach ($product->media as $media)
                                <img src="{{ asset('/productIMG/' . $media->img_name) }}" class="img-fluid" alt=""
                                    height="100px" width="100px" />
                                {{-- <img src="{{ asset('front/img/natural-img2.png') }}" class="img-fluid" alt="" /> --}}
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="heading_wreap">
                        <h4>{{ $product->name }}</h4>
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
                                    <input type="radio" id="test1" name="radio-group" value="{{ $first->price }}"
                                        checked />
                                    <label for="test1">
                                        <div>
                                            <h6>Subscribe And Save</h6>

                                            <select name="offer" id="member">
                                                <option value="" selected>select subscription</option>
                                                @foreach ($subscription as $sub)
                                                    <option data-id="{{ $sub->id }}" id="option"
                                                        value="{{ $sub->id }}">Delivery every
                                                        {{ $sub->recurring_period }} {{ $sub->recurring_type }}
                                                        {{ $sub->discount_percentage }}% off</option>
                                                @endforeach
                                            </select>
                                            <p>
                                                Easy to cancel anytime,<br />
                                                Free Shipping always,<br />

                                            </p>

                                        </div>

                                        <div class="purcha_text">
                                            <strong>$<strong style="display: inline"
                                                    id="Sprice">{{ $first->price }}</strong></strong>
                                            <span>Per bottle</span>
                                            <strong id="discount"> </strong>
                                            <br>
                                            <strong id="save"> </strong>

                                        </div>
                                    </label>
                                </div>
                                <div class="purchase_hd">
                                    <input type="radio" id="test2" name="radio-group" value="{{ $first->price }}" />
                                    <label for="test2">
                                        <div>
                                            <h6>One Time</h6>
                                            <p>One time purchase</p>
                                        </div>
                                        <div class="purcha_text">
                                            <strong>$<strong style="display: inline"
                                                    id="price">{{ $first->price }}</strong></strong>
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
                                @foreach ($product->variations as $var)
                                    <div class="input-container">
                                        <input id="walk" class="radio-button" data-varid="{{ $var->id }}"
                                            type="radio" name="radio" value="{{ $var->strength }}"
                                            {{ $loop->first ? 'checked' : '' }} />
                                        <div class="radio-tile">
                                            <label for="walk" class="radio-tile-label"> {{ $var->strength }}mg</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="sav_total">
                            <h6>you're saving $<strong id="saving">0</strong> on subscription</h6>
                            <p>Total: $<span id="total">{{ $first->price }}</span></p>
                        </div>
                        @if (Auth::check())
                            <button data-toggle="modal" id="addCART" data-target="#gotocart"
                                data-id="{{ $product->id }}" class="main-btn"> Add to Cart </button>
                        @else
                            <a class="main-btn" href="{{ route('login') }}">add to cart</a>
                        @endif
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
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">Directions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-Ingredients-tab" data-toggle="pill" href="#pills-Ingredients"
                                role="tab" aria-controls="pills-Ingredients" aria-selected="false">Ingredients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-Results-tab" data-toggle="pill" href="#pills-Results"
                                role="tab" aria-controls="pills-Results" aria-selected="false">Lab Results</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-Reviews-tab" data-toggle="pill" href="#pills-Reviews"
                                role="tab" aria-controls="pills-Reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="information_cantent">
                                <p>
                                    <?php echo $product->description; ?>
                                </p>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="information_cantent">
                                <p>
                                    <?php echo $product->direction; ?>
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Ingredients" role="tabpanel"
                            aria-labelledby="pills-Ingredients-tab">
                            <div class="information_cantent">
                                <p>
                                    <?php echo $product->ingredients; ?>
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Results" role="tabpanel"
                            aria-labelledby="pills-Results-tab">
                            <div class="information_cantent">
                                <p>
                                    <?php echo $product->lab_results; ?>
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Reviews" role="tabpanel"
                            aria-labelledby="pills-Reviews-tab">
                            <div class="information_cantent">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                    has been the industry's standard dummy text ever since the 1500s,
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
                        @foreach ($categories as $category)
                            <div href="product-detail.html">
                                <div class="card border-0">
                                    <div class="product_img">
                                        @foreach ($category->media as $media)
                                        @endforeach
                                        <img class="card-img-top" src="{{ asset('/productIMG/' . $media->img_name) }}"
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
                                            @foreach ($category->variations as $var)
                                            @endforeach
                                            <span class="prodollar">${{ $var->price }}</span>
                                        </div>
                                        <h6 class="card-title">{{ $category->name }}</h6>
                                        <a href="{{ route('shopdetails', ['id' => $category->id]) }}" type="button"
                                            class="btn main-btn  btn-lg btn-block">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //variation function
        $(document).ready(function() {
            const variationSelect = document.getElementById("member");
            const discount = document.getElementById("discount");
            const Save = document.getElementById("save");
            const Saving = document.getElementById("saving");
            $('input[name="radio"]').on('change', function() {
                discount.textContent = '';
                Save.textContent = '';
                Saving.textContent = 0;
                variationSelect.selectedIndex = 0;
                var selectedSize = $(this).val();
                var price = <?php echo json_encode($variations); ?>[selectedSize];
                $('#price').text(price);
                $('#Sprice').text(price);
                $('#test1').val(price);
                $('#test2').val(price);
                $('#total').text(price);

            });
        });
        // purchased type function
        $(document).ready(function() {

            const Saving = document.getElementById("saving");
            $('input[name="radio-group"]').on('change', function() {
                var selectedtype = $(this).val();
                
                // Saving.textContent = 0;
                $('#total').text(selectedtype);

            });
        });
        //subscription function
        $(document).ready(function() {
            $('select[name="offer"]').on('change', function() {
                var selectedSize = $(this).val();
                if (selectedSize==='') {
                    $('#discount').text('');
                  
                } else {
                    var offer = <?php echo json_encode($offer); ?>[selectedSize];
                    $('#discount').text(offer + '%' + '' + 'off');
                }
            });
        });
        //discount function
        document.addEventListener('DOMContentLoaded', function() {


            $('select[name="offer"]').on('change', function() {

                const productPriceElement = document.getElementById('Sprice');
                var productPrice = productPriceElement.textContent;

                var selectedSize = $(this).val();
                if (selectedSize==='') {
                    $('#discount').text('');
                    $('#total').text(productPrice);
                        $('#save').text('');
                        $('#test1').val(productPrice);
                        $('#saving').text('0');
                } else {
                    var offer = <?php echo json_encode($offer); ?>[selectedSize];

                    var dis = offer / 100 * productPrice;
                    const discountedPrice = productPrice - dis;
                    const selectedRadioButtonId = document.querySelector(
                            'input[name="radio-group"]:checked')
                        .id;
                    if (selectedRadioButtonId === 'test1') {
                        $('#total').text(discountedPrice);
                        $('#save').text('Save' + '  ' + '$' + dis.toFixed(2));
                        $('#test1').val(discountedPrice);
                        $('#saving').text(dis.toFixed(2));
                    } else {
                        $('#save').text('Save' + '  ' + '$' + dis.toFixed(2));
                        $('#test1').val(discountedPrice);
                        $('#saving').text(dis.toFixed(2));
                    }
                }
            });
        });
        // add to cart function
        $(document).ready(function() {
            $('#addCART').on('click', function(e) {
                e.preventDefault();
                const cartDIV = document.getElementById('cartDIV');
                const pimage = document.getElementById('productIMG');
                const pname = document.getElementById('productname');
                const cartprice = document.getElementById('productprice');
                const pquantity = document.getElementById('qty');
                const selectedRadioButtonId = document.querySelector('input[name="radio-group"]:checked')
                    .id;
                const selectedbutton = document.getElementById('member');
                const optionvalue = selectedbutton.value;
                if (selectedRadioButtonId === 'test1') {
                    if (optionvalue=== '') {
                        alert("please select subscription");
                    } else {
                        var productId = $(this).data('id');
                        var selectedRadioButton = $('input[name="radio"]:checked');
                        var varId = selectedRadioButton.data('varid');
                        var SId = $('#member').val();
                        var p = document.getElementById('total');
                        var price = p.textContent;

                        $.ajax({
                            type: 'POST',
                            url: '{{ url('AddCart') }}',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                id: productId,
                                Sid: SId,
                                varID: varId,
                                Price: price,

                            },
                            dataType: 'json',
                            success: function(response) {
                                if(response.msg==="new"){
                                cartDIV.style.display = 'block';
                                pname.textContent = response.name;
                                pquantity.textContent = response.qty;
                                cartprice.textContent = ` $${response.price}`;
                                pimage.innerHTML = response.image;
                                // console.log(response.image);
                                // $('#submitButton').html(response.msg);
                            }
                            },
                            error: function(xhr, status, error) {
                                console.log('Error:', xhr, status, error);
                            }
                        });

                    }
                } else {
                    var productId = $(this).data('id');
                    var selectedRadioButton = $('input[name="radio"]:checked');
                    var varId = selectedRadioButton.data('varid');
                    var SId = $('#member').val();
                    var p = document.getElementById('total');
                    var price = p.textContent;

                    $.ajax({
                        type: 'POST',
                        url: '{{ url('AddCart') }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: productId,
                            Sid: SId,
                            varID: varId,
                            Price: price,

                        },
                        dataType: 'json',
                        success: function(response) {
                         if(response.msg==="new"){
                            cartDIV.style.display = 'block';
                                pname.innerHTML = response.name;
                                // pquantity.textContent = response.qty;
                                cartprice.innerHTML = response.price;
                                pimage.innerHTML = response.image;
                            }else{

                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Error:', xhr, status, error);
                        }
                    });
                }
            });

        });
    </script>
@endsection
