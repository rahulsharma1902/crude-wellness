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
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Doctors Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Customers Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="reviews_grid">
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_1.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Jerry C. Prentice</h6>
                                            <span>Physician and Author</span>
                                        </div>
                                    </div>
                                    <p>
                                        “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_2.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Ruth D. Grinnell</h6>
                                            <span>Ruth D. Grinnell</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_3.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Orlando R. Bean</h6>
                                            <span>Orlando R. Bean</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_1.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Jerry C. Prentice</h6>
                                            <span>Physician and Author</span>
                                        </div>
                                    </div>
                                    <p>
                                        “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_2.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Ruth D. Grinnell</h6>
                                            <span>Ruth D. Grinnell</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_3.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Orlando R. Bean</h6>
                                            <span>Orlando R. Bean</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_1.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Jerry C. Prentice</h6>
                                            <span>Physician and Author</span>
                                        </div>
                                    </div>
                                    <p>
                                        “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_2.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Ruth D. Grinnell</h6>
                                            <span>Ruth D. Grinnell</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_3.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Orlando R. Bean</h6>
                                            <span>Orlando R. Bean</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_1.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Jerry C. Prentice</h6>
                                            <span>Physician and Author</span>
                                        </div>
                                    </div>
                                    <p>
                                        “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_2.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Ruth D. Grinnell</h6>
                                            <span>Ruth D. Grinnell</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_3.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Orlando R. Bean</h6>
                                            <span>Orlando R. Bean</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_1.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Jerry C. Prentice</h6>
                                            <span>Physician and Author</span>
                                        </div>
                                    </div>
                                    <p>
                                        “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_2.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Ruth D. Grinnell</h6>
                                            <span>Ruth D. Grinnell</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_3.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Orlando R. Bean</h6>
                                            <span>Orlando R. Bean</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="reviews_grid">
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_1.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Jerry C. Prentice</h6>
                                            <span>Physician and Author</span>
                                        </div>
                                    </div>
                                    <p>
                                        “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_2.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Ruth D. Grinnell</h6>
                                            <span>Ruth D. Grinnell</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_3.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Orlando R. Bean</h6>
                                            <span>Orlando R. Bean</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_1.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Jerry C. Prentice</h6>
                                            <span>Physician and Author</span>
                                        </div>
                                    </div>
                                    <p>
                                        “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_2.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Ruth D. Grinnell</h6>
                                            <span>Ruth D. Grinnell</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_3.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Orlando R. Bean</h6>
                                            <span>Orlando R. Bean</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_1.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Jerry C. Prentice</h6>
                                            <span>Physician and Author</span>
                                        </div>
                                    </div>
                                    <p>
                                        “It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages”
                                    </p>
                                </div>
                                <div class="testimonial-para">
                                    <div class="test_view">
                                        <div class="test_img">
                                            <img src="{{ asset('front/img/testimonial_2.png') ?? '' }}" class="img-fluid" alt="">
                                        </div>
                                        <div class="test_hd">
                                            <h6>Ruth D. Grinnell</h6>
                                            <span>Ruth D. Grinnell</span>
                                        </div>
                                    </div>
                                    <p>
                                        “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s”
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection