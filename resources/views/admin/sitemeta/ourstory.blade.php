@extends('admin_layout/master')
@section('content')
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content d-flex justify-content-between">
                                                <h4 class="title nk-block-title">Our Story Page Meta</h4>
                                                {{ Breadcrumbs::render('ourstory') }}
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <form action="{{ url('admin-dashboard/ourstory-meta/addProcc') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="card-inner">
                                                 <span class="preview-title-lg overline-title">Banner Section</span>
                                                <div class="form-group">
                                                    <label class="form-label" for="banner_text">Banner Section text</label>
                                                    <div class="form-control-wrap">
                                                    <textarea class="form-control" id="banner_text" name="banner_text" >{{ $StoryMeta->banner_text ?? '' }}</textarea>
                                                    </div>
                                                </div> 
                                                <hr>
                                                <span class="preview-title-lg overline-title">Video Section</span>
                                                <div class="form-group">
                                                    <label class="form-label" for="video_text">Video Section text</label>
                                                    <div class="form-control-wrap">
                                                    <textarea class="form-control" id="video_text" name="video_text">{{ $StoryMeta->video_text ?? '' }}</textarea>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="thumnail_image">Video Thumnail Image</label>
                                                            <div class="form-control-wrap">
                                                                <input type="file" name="thumnail_image" class="form-control" id="thumnail_image">
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="video_url">Video Url</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" name="video_url" class="form-control" id="video_url" value="{{ $StoryMeta->video_link ?? '' }}">
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-6 mt-2">
                                                        <img src="{{ asset('site_meta') }}/{{ $StoryMeta->video_thumnail_image ?? '' }}" alt="">
                                                    </div>
                                                </div>
                                                <hr>
                                                <span class="preview-title-lg overline-title">Profile Section</span>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="profile_name">Profile Name</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" name="profile_name" class="form-control" id="profile_name" value="{{ $StoryMeta->profile_name ?? '' }}" >
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="profile_position">Profile Position</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" name="profile_position" class="form-control" id="profile_position" value="{{ $StoryMeta->profile_position ?? '' }}">
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="profile_image">Profile Image</label>
                                                            <div class="form-control-wrap">
                                                                <input type="file" name="profile_image" class="form-control" id="profile_image">
                                                            </div>
                                                        </div> 
                                                    </div>  
                                                    <div class="col-lg-6 mt-2">
                                                        <img src="{{ asset('site_meta/') }}/{{ $StoryMeta->profile_image ?? '' }}" alt="">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="profile_description">Profile description</label>
                                                            <div class="form-control-wrap">
                                                                <textarea  name="profile_description" class="form-control" id="profile_description">{{ $StoryMeta->profile_text ?? '' }}</textarea>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="profile_message">Profile Message</label>
                                                            <div class="form-control-wrap">
                                                                <textarea name="profile_message" class="form-control" id="profile_message">{{ $StoryMeta->message ?? '' }}</textarea>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-lg-6 mt-3">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                        </div><!-- .card-preview -->
                                      
                                    </div>
                                    <script>
                                        const editorIds = ['#banner_text', '#video_text', '#profile_description', '#profile_message'];

                                                editorIds.forEach(id => {
                                                    ClassicEditor
                                                        .create(document.querySelector(id))
                                                        .then(editor => {
                                                            console.log(editor);
                                                        })
                                                        .catch(error => {
                                                            console.error(error);
                                                        });
                                                });
                                    </script>

@endsection