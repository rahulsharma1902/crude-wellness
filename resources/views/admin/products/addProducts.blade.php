@extends('admin_layout/master')
@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Upload Product</h4>
        </div>
    </div>
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">Product Info </h5>
            </div>
            <form action="{{ url('productSave') ?? '' }}" class="form-validate" novalidate="novalidate" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="form-group">
                                    @error('name')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            <label class="form-label" for="name">Product Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        @error('slug')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            <label class="form-label" for="slug">Slug</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="slug" name="slug">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        @error('featured_img')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            <label class="form-label" for="featured_img">Featured Image</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" id="featured_img" name="featured_img">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        @error('images')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            <label class="form-label" for="images">Product Images</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" id="images" name="images">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        @error('category_id')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            <label class="form-label" for="category_id">Product Category</label>
                            <div class="form-control-wrap">
                                <select class="form-select js-select2 " id="category_id" name="category_id">
                                    @if($categories)
                                        @foreach ($categories as $category) 
                                            <option value="{{ $category->id ?? '' }}" >{{ $category->name ?? '' }}</option>
                                        @endforeach
                                    @else
                                        <option value="">No category found !</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                        @error('description')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            <label class="form-label" for="description">Description</label>
                            <div class="form-control-wrap">
                                <textarea class="form-control form-control-sm" id="description" name="description"
                                    value="" placeholder="Write your Details"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        @error('direction')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            <label class="form-label" for="direction">Direction</label>
                            <div class="form-control-wrap">
                                <textarea class="form-control form-control-sm" id="direction" name="direction" value=""
                                    placeholder="Write your Details"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        @error('ingredients')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            <label class="form-label" for="ingredients">Ingredients</label>
                            <div class="form-control-wrap">
                                <textarea class="form-control form-control-sm" id="ingredients" name="ingredients"
                                    value="" placeholder="Write your Details"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                        @error('lab_results')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            <label class="form-label" for="lab_results">Lab Results</label>
                            <div class="form-control-wrap">
                                <textarea class="form-control form-control-sm" id="lab_results" name="lab_results"
                                    value="" placeholder="Write your Details"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="">Variations</label>
                            <div class="variations-container">
                                <div class="variation-row">
                                    <div class="row">
                                        <div class="col">
                                        @error('strength')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                            <label class="form-label" for="">Strength</label>
                                            <div class="form-control-wrap">
                                                <input type="number" name="strength[]" class="strength">
                                            </div>
                                        </div>
                                        <div class="col">
                                        @error('qty')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                            <label class="form-label" for="">Qty</label>
                                            <div class="form-control-wrap">
                                                <input type="number" name="qty[]" class="qty">
                                            </div>
                                        </div>
                                        <div class="col">
                                        @error('price')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                            <label class="form-label" for="">Price</label>
                                            <div class="form-control-wrap">
                                                <input type="number" name="price[]" class="price">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <button type="button"
                                                class="btn btn-danger removeVariation mt-4">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success addMoreVariation mt-4">Add</button>
                        </div>
                    </div>
                    <hr>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Save Product</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Add new variation
    $('.addMoreVariation').on('click', function() {
        var clone = $('.variation-row:first').clone(true);
        clone.find('.strength, .qty').val('');
        clone.find('.price').val('');
        clone.find('.addMoreVariation').remove();
        clone.find('.removeVariation').show();
        $('.variations-container').append(clone);
    });

    // Remove variation
    $('.variations-container').on('click', '.removeVariation', function() {
        if ($('.variation-row').length > 1) {
            $(this).closest('.variation-row').remove();
        }
    });
});
</script>

<script>
const editorIds = ['#description', '#direction', '#ingredients', '#lab_results'];

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



<script>
$(document).ready(function() {
    $('#name').on('keyup', function() {
        let name = $(this).val().toLowerCase();
        let slug = name.replace(/\s+/g, "-"); // Replace consecutive spaces with a single dash
        $('#slug').val(slug);
    });
});
</script>
@endsection