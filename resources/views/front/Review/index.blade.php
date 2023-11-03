@extends('front_layout/master')
@section('content')

<section class="banner_wrapper p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner_content">
                        <div class="heading_wreap text-left">
                            <h2>Crude<br> Reviews </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="reviews_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <?php $first = true; ?>
                        @foreach($review_category as $category)
                        <li class="nav-item">
                            <a class="nav-link @if($first == true) active @endif" id="pills-home-tab" data-toggle="pill" href="#{{ $category->slug ?? '' }}" role="tab" aria-controls="{{ $category->slug ?? '' }}" aria-selected="true">{{ $category->name ?? '' }}</a>
                        </li>
                        <?php $first = false; ?>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <?php $first = true; ?>
                    @foreach($review_category as $category)
                        <div class="tab-pane fade show @if($first == true) active @endif" id="{{ $category->slug ?? '' }}" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="reviews_grid">
                                @foreach($category->reviews as $review)
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('reviewsIMG') }}/{{ $review->image ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>{{ $review->review_by ?? '' }}</h6>
                                            <span>{{ $review->position ?? '' }}</span>
                                        </div>
                                    </div>
                                    <p>
                                        “{{ $review->text ?? '' }}”
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <?php $first = false; ?>
                    @endforeach  
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection