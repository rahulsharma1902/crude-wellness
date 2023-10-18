@extends('front_layout/master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="p-1">
                <a href="" class="main-btn" style="width:100%;">Orders</a>
            </div>
            <div class="p-1">
                <a href="{{ url('logout') }}" class="main-btn" style="width:100%;">logout</a>
            </div>
        </div>
        <div class="col-lg-8">
            <h4>Welcome {{ Auth::user()->name ?? '' }}</h4>
            <div class="p-3">
                    You haven't placed any orders yet.
            </div>
        </div>
    </div>
</div>

@endsection