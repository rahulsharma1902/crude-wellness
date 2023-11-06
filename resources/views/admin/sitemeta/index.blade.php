@extends('admin_layout/master')
@section('content')
<div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content d-flex justify-content-between">
                                                <h4 class="title nk-block-title">Site Details</h4>
                                                {{ Breadcrumbs::render('site-detail') }}
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                            <form action="{{ url('admin-dashboard/site-detail/addProcc') }}" method="post">
                                                @csrf
                                                <div class="row gy-4">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="header_text">Header Text</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="header_text" name="header_text" value="{{ $sitemeta->header_text ?? '' }}" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="support_email">Support Email</label>
                                                            <div class="form-control-wrap">
                                                                <input type="email" class="form-control" id="support_email" name="support_email" value="{{ $sitemeta->support_email ?? '' }}" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="support_phone">Support Phone Number</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="support_phone" name="support_phone" value="{{ $sitemeta->support_phone ?? '' }}" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="facebook">Facebook link</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $sitemeta->facebook ?? '' }}" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="instagram">Instagram link</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $sitemeta->instagram ?? '' }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="pintrest">Pintrest link</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="pintrest" name="pintrest" value="{{ $sitemeta->pintrest ?? '' }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="footer_title">Footer title</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="footer_title" name="footer_title" value="{{ $sitemeta->footer_title ?? '' }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="footer_text">Footer text</label>
                                                            <div class="form-control-wrap">
                                                                <textarea  class="form-control" id="footer_text" name="footer_text">{{ $sitemeta->footer_text ?? '' }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div><!-- .card-preview -->
                                    
                                    </div>
<script>
     ClassicEditor
        .create(document.querySelector('#footer_text'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection