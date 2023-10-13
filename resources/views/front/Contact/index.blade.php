@extends('front_layout/master')
@section('content')
 <section class="banner_wrapper p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner_content">
                        <div class="heading_wreap text-left">
                            <h2>Contact Crude Wellness</h2>
                            <p>
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact_us_wreap p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact_us_content">
                        <div class="text-center">
                            <h4>Let’s Talk!</h4>
                            <p>
                                Fill out the following from and we will get back to you within 48 hours.
                            </p>
                        </div>
                        <ul class="list-unstyled">
                            <li>Support email: <a href="mailto:info@crudewellness.com">info@crudewellness.com</a></li>
                        </ul>
                        <form class="row" method="POST" action="{{ url('contactProcc') ?? '' }}">
                            @csrf
                            <div class="col-lg-12">
                                <h4>Fill the Form to Contact us Immediately</h4>
                            </div>
                            <div class="col-lg-6">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                                <input type="text" class="form-control" placeholder="Your name" name="name">
                            </div>
                            <div class="col-lg-6">
                            @error('email')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                                <input type="email" class="form-control" placeholder="Your email" name="email">
                            </div>
                            <div class="col-lg-12">
                            @error('message')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" placeholder="Your message" name="message"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <div class="cont_mass text-center">
                                    <a href="#" class="main-btn" onclick="$(this).closest('form').submit();">Send Message</a>
                                    <!-- <a href="#" class="main-btn">Send Message</a> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection