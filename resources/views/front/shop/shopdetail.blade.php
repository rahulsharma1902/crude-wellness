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
                            @foreach($product->media as $media)
                            @endforeach
                            <img src="{{ asset('/productIMG/'.$media->img_name) }}" class="img-fluid" alt="" height="300px" width="300px" />
                        </div>
                        
                        <div class="natural_imgbt">
                            @foreach($product->media as $media)
                            <img src="{{ asset('/productIMG/'.$media->img_name) }}" class="img-fluid" alt="" height="100px" width="100px" />
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
                                    <input type="radio" id="test1" name="radio-group" checked />
                                    <label for="test1">
                                        <div>
                                            <h6>Subscribe And Save</h6>
                                            
                                            <select name="offer" id="member">
                                                <option value="" selected>select subscription</option>
                                                @foreach($subscription as $sub)
                                                <option data-id="{{ $sub->id }}" id="option" value="{{ $sub->id }}">Delivery every {{ $sub->recurring_period }}  {{ $sub->recurring_type}}  {{ $sub->discount_percentage }}%  off</option>
                                                @endforeach
                                            </select>
                                            <p>
                                                Easy to cancel anytime,<br />
                                                Free Shipping always
                                            </p>
                                           
                                        </div>
                                        
                                        <div class="purcha_text">
                                            <strong id="Sprice">${{ $first->price }}</strong>
                                            <span>Per bottle</span>
                                            <strong id="discount">  </strong>

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
                                            <strong id="price">${{ $first->price }}</strong>
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
                                @foreach($product->variations as $var)
                                <div class="input-container">
                                    <input id="walk" class="radio-button" data-varid="{{ $var->id}}" type="radio" name="radio" value="{{ $var->strength }}" {{$loop->first ? 'checked' : ''}}/>
                                            <div class="radio-tile">
                                        <label for="walk" class="radio-tile-label">  {{ $var->strength }}mg</label>
                                    </div>
                                   </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="sav_total">
                            <h6>You're saving $11.00</h6>
                            <p>Total: <span id="total" >${{ $first->price }}</span></p>
                        </div>
                        <button data-toggle="modal" id="addCART" data-target="#gotocart" data-id="{{ $product->id }}" class="main-btn"> Add to Cart  </button>
                      
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
                                     <?php echo( $product->description) ?>
                                </p>
                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="information_cantent">
                                <p>
                                    <?php echo($product->direction) ?>
                                 </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Ingredients" role="tabpanel" aria-labelledby="pills-Ingredients-tab">
                            <div class="information_cantent">
                                <p>
                                    <?php echo($product->ingredients) ?>
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Results" role="tabpanel" aria-labelledby="pills-Results-tab">
                            <div class="information_cantent">
                                <p>
                                    <?php echo($product->lab_results) ?>
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
                        @foreach ($categories as $category)
                         <div href="product-detail.html">
                            <div class="card border-0">
                                <div class="product_img">
                                    @foreach($category->media as $media)
                                    @endforeach
                                    <img class="card-img-top" src="{{ asset('/productIMG/'.$media->img_name) }}" alt="Card image cap">
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
                                        @foreach($category->variations as $var)
                                        @endforeach
                                        <span class="prodollar">${{ $var->price }}</span>
                                    </div>
                                    <h6 class="card-title">{{ $category->name }}</h6>
                                    <a href="{{ route('shopdetails',['id'=>$category->id]) }}" type="button" class="btn main-btn  btn-lg btn-block">Shop Now</a>
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
    $(document).ready(function () {
        $('input[name="radio"]').on('change', function () {
            var selectedSize = $(this).val();
            var price = <?php echo json_encode($variations); ?>[selectedSize];
            $('#price').text('$' + price);
            $('#Sprice').text('$' + price); 
            $('#total').text('$' + price); 
        });
    });

    $(document).ready(function () {
        $('select[name="offer"]').on('change', function () {
            var selectedSize = $(this).val();
            var offer =<?php echo json_encode($offer); ?> [selectedSize];
            $('#discount').text( offer + '%' +''+'off');
           
        });
    });
    // document.addEventListener('DOMContentLoaded', function () {
    //     const productPriceElement = $('#Sprice').text();
    //     const discountInput = document.getElementById('discount');
        

    //     $('select[name="offer"]').on('change', function () {
    //         const discount = $(this).val();
    //         const productPrice = parseFloat(productPriceElement.textContent);
    //         // const discount = parseFloat(discountInput.value);

    //         if (isNaN(discount)) {
    //             alert('Please enter a valid discount amount.');
    //             return;
    //         }
    //         var dis = productPrice % discount;

    //         const discountedPrice = productPrice - discount;
    //         $('#total').text('$' + dis); 
    //     });
    // });

    $(document).ready(function() {
        $('#addCART').on('click', function(e) {
            e.preventDefault();
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
                    Price:price,
                   
                },
                dataType: 'json',
                success: function(response) {
                    // $('#submitButton').html(response.btn);
                    // $('#total').html(response.element);
                    // $('#after').html(response.d);
                    // $('#discount').html(response.new);
                    // $('#final').html(response.n);
                },
                error: function(xhr, status, error) {
                    console.log('Error:', xhr, status, error);
                }
            });
      
        });
    });
</script>

@endsection