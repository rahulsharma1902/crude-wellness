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
                        <form method="post" action="{{ url('forgotten-password/submit') }}">
                            @csrf
                            <div class="form-heading">
                                <span>Forgotten Password</span>
                            </div>
                            <div class="form-groups">
                                <input type="email" class="form-control" id="username" name="username" aria-describedby="userHelp" placeholder="User Name" />
                            @error('username')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            
                            <div class="form-text2 d-flex">
                                <button type="login" class="btn main-btn">Submit</button>
                                <p>Don’t have an account? <a href="{{ url('register') }}">Sign Up</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection