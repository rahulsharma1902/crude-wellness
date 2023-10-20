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
                        <form method="post" action="{{ url('loginProcc') }}">
                            @csrf
                            <div class="form-heading">
                                <span>Login</span>
                                <h4>Welcome Back</h4>
                            </div>
                            <div class="form-groups">
                                <input type="text" class="form-control" id="username" name="username" aria-describedby="userHelp" placeholder="User Name" />
                            @error('username')
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
                            <div class="form-text1 d-flex">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                                </div>
                                <a href="{{ url('forgotten-password') }}">Forget Password?</a>
                            </div>
                            <div class="form-text2 d-flex">
                                <button type="login" class="btn main-btn">login</button>
                                <p>Don’t have an account? <a href="{{ url('register') }}">Sign Up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection