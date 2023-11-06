@extends('admin_layout/master')
@section('content')
<div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content d-flex justify-content-between">
                                                <div>
                                                     <h4 class="title nk-block-title">Add Discount Coupon</h4>
                                                </div>
                                                <div>
                                                {{ Breadcrumbs::render('add-discount') }}
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ url('admin-dashboard/discount-coupons/submitProcc') }}" method="post">
                                            @csrf
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">                                                
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input type="hidden" name="id" value="{{ $discount->id ?? '' }}">
                                                                <label class="form-label" for="discount_name">Discount Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" name="discount_name" class="form-control" id="discount_name"  placeholder="Enter Discount Name" value="{{ $discount->discount_name ?? '' }}">
                                                                </div>
                                                                @if ($errors->has('discount_name'))
                                                                    <span class="text-danger">{{ $errors->first('discount_name') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="discount_code">Coupon Code</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" name="discount_code" class="form-control" id="discount_code" placeholder="Enter Coupon code" value="{{ $discount->discount_code ?? '' }}">
                                                                </div>
                                                                @if ($errors->has('discount_code'))
                                                                    <span class="text-danger">{{ $errors->first('discount_code') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-06">Discount Type</label>
                                                                <div class="form-control-wrap ">
                                                                    <div class="form-control-select">
                                                                        <select class="form-control" name="discount_type" id="discount_type">
                                                                            <option value="fixed" @if(isset($discount)) @if($discount->discount_type == 'fixed') selected @endif @endif >Fixed</option>
                                                                            <option value="percentage" @if(isset($discount)) @if($discount->discount_type == 'percentage') selected  @endif @endif>Percentage</option>
                                                                        </select>
                                                                    </div>
                                                                    @if ($errors->has('discount_type'))
                                                                    <span class="text-danger">{{ $errors->first('discount_type') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="amount">Amount</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-text-hint">
                                                                        <span class="overline-title">Usd</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" name="amount" id="amount" value="{{ $discount->amount ?? '' }}" >
                                                                </div>
                                                                @if ($errors->has('amount'))
                                                                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="discount_use">Discount Use</label>
                                                                <div class="form-control-wrap ">
                                                                    <div class="form-control-select">
                                                                        <select class="form-control" name="discount_use" id="discount_use">
                                                                            <option @if(isset($discount)) @if($discount->discount_use == "single") selected @endif @endif value="single" >Single</option>
                                                                            <option @if(isset($discount)) @if($discount->discount_use == "multiple") selected @endif @endif value="multiple">Multiple</option>
                                                                        </select>
                                                                    </div>
                                                                    @if ($errors->has('discount_use'))
                                                                    <span class="text-danger">{{ $errors->first('discount_use') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="expire-on">Expire On</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="datetime-local" class="form-control" name="expire_on" id="expire-on" value="{{ $discount->expire_on ?? '' }}" placeholder="Input placeholder">
                                                                </div>
                                                                @if ($errors->has('expire_on'))
                                                                    <span class="text-danger">{{ $errors->first('expire_on') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-3">
                                                            @if($discount)
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                <a type="button" href="{{ url('admin-dashboard/discount-coupons/add') }}" class="btn btn-primary">Add New</a>
                                                            @else
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                            @endif
                                                        </div>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                        
                                    </div>
    <script>
       
        $("#discount_name").on('change',function(){
        let random_string = randomString(4, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        let name = $(this).val().toUpperCase();
        let half_name = name.substr(0, 4);
        let coupon_code = '#'+half_name+'-'+random_string;
        $("#discount_code").val(coupon_code);
        });
        function randomString(length, chars) {
            var result = '';
            for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
            return result;
        }


        $('select[name="discount_type"]').on('change',function(){
            value = $(this).val();
            if(value == "percentage"){
                $('span.overline-title').html('%');
            }else{
                $('span.overline-title').html('USD');
            }
        });
    </script>
@endsection