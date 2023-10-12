@extends('front_layout/master')
@section('content')
<section class="login_wrapper p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_img">
                        <img src="{{ asset('front/img/login_img.png') }}" class="img-fluid" alt="" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-ryt-content">
                        <form method="post" action="{{ url('registerProcc') }}">
                            @csrf
                            <div class="form-heading">
                                <span>Register</span>
                                <h4>Welcome Back</h4>
                            </div>
                            <div class="form-groups">
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="userHelp" placeholder="Name" />
                            @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                            </div>
                            <div class="form-groups">
                                <input type="text" class="form-control" id="email" name="email" aria-describedby="userHelp" placeholder="Email" />
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-groups">
                                <div class="input-group forget_pw" id="show_hide_password">
                                    <input class="form-control" type="password" name="password" placeholder="Password" />
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        
                            <div class="form-text2 d-flex">
                                <button type="submit" class="btn main-btn">Register</button>
                                <p>
                                    Already have an account? <a href="{{ url('login') }}">Sign In</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection