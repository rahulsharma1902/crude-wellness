@extends('admin_layout/master')
@section('content')

<div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Add Review</h4>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <form action="{{ url('admin-dashboard/reviews/addProcc') }}" method="post" enctype="multipart/form-data">
                                                    <div class="row gy-4">
                                                            @csrf
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id" value="{{ $review->id ?? '' }}">
                                                                    <label class="form-label" for="name">Review By</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" name="name" id="name" value="{{ $review->review_by ?? '' }}" placeholder="Review By">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label" for="position">User Postion</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" name="position" id="position" value="{{ $review->position ?? '' }}" placeholder="Position">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label" for="image">User Image</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="file" class="form-control" name="image" id="image" >
                                                                    </div>
                                                                    <img src="{{ asset('reviewsIMG') }}/{{ $review->image ?? '' }}" class="img-fluid mt-2" alt="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="category" class="form-label">Review Category</label>
                                                                    <div class="form-control-wrap">
                                                                        <select name="category" id="categoryname" class="form-control">
                                                                            @foreach($categories as $category)
                                                                                <option value="{{ $category->id ?? '' }}" @if(isset($review->category_id)) @if($category->id == $review->category_id) selected @endif @endif>{{ $category->name ?? '' }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label" for="text">Review Text</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea class="form-control" name="text" id="text" >{{ $review->text ?? '' }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!-- .card-preview -->
                                       
                                    </div>

@endsection