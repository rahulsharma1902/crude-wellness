@extends('admin_layout/master')
@section('content')

        <div class="nk-block nk-block-lg">
            <div class="nk-block-head d-flex justify-content-between">
                <div class="nk-block-head-content">
                    <h4 class="title nk-block-title">Account Setting</h4>
                </div>
            </div>
            <div class="card card-bordered card-preview">
                <div class="card-inner">
                   
                    <div class="preview-block">
                        <form action="{{ url('admin-dashboard/settingupdate')  }}" method="post">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{ auth()->user()->name ?? '' }}">
                                    </div>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" value="{{ auth()->user()->email ?? '' }}">
                                    </div>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="form-control-wrap">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password if you want to change">
                                    </div>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="confirm-password">Confirm Password</label>
                                    <div class="form-control-wrap">
                                        <input type="password" class="form-control" id="confirm-password" name="confirmpassword" placeholder="Confirm your password">
                                    </div>
                                    @error('confirmpassword')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 mt-3">
                                <div class="form-group">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

@endsection