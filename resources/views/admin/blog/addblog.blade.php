@extends('admin_layout/master')
@section('content')

                        <div class="nk-content">
                              <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content d-flex justify-content-between">
                                                <h4 class="title nk-block-title">Add Blog</h4>
                                                <div>
                                                    {{ Breadcrumbs::render('blogs-add',$blog->slug ?? '') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                             <form action="{{ url('admin-dashboard/blogs/addProcc') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $blog->id ?? '' }}">
                                                <div class="row gy-4">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="title">Blog Title</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" name="title" id="title" placeholder="Blog Title" value="{{ $blog->title ?? '' }}">
                                                            </div>
                                                            @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="title">Blog Slug</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Blog slug" value="{{ $blog->slug ?? '' }}">
                                                            </div>
                                                            @error('slug')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="sub-title">Sub Title</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" name="subtitle" id="sub-title" placeholder="Blog Title" value="{{ $blog->sub_title ?? '' }}">
                                                            </div>
                                                            @error('subtitle')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="category">Blog Category</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-control" name="category" id="category">
                                                                    @foreach($categories as $category)
                                                                    <option value="{{ $category->id ?? '' }}" @if(isset($blog)) @if($category->id == $blog->cat_id) selected @endif @endif>{{ $category->name ?? '' }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error('category')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="image">Blog Image</label>
                                                            <div class="form-control-wrap">
                                                                <input type="file" class="form-control" name="image" id="image" >
                                                            </div>
                                                        </div>
                                                        @error('image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <img src="{{ asset('blog_images') }}/{{ $blog->image ?? '' }}" alt="">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="short-description">Short Description</label>
                                                            <div class="form-control-wrap">
                                                                <textarea name="short_description" class="form-control" id="short-description" >{{ $blog->short_description ?? '' }}</textarea>
                                                            </div>
                                                        </div>
                                                        @error('short_description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="description">Description</label>
                                                            <div class="form-control-wrap">
                                                                <textarea name="description" class="form-control" id="description">{{ $blog->description ?? '' }}</textarea>
                                                            </div>
                                                        </div>
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-12">
                                                    <div class="form-group" id="save">
                                                        <button type="submit" class="btn btn-primary"> Save </button>
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                $(document).ready(function() {
                                    $('#title').on('keyup', function() {
                                        let name = $(this).val().toLowerCase();
                                        let slug = name.replace(/\s+/g, "-"); // Replace consecutive spaces with a single dash
                                        $('#slug').val(slug);
                                    });
                                });
                                </script>
                                <script>
                                    const editorIds = ['#short-description', '#description'];

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