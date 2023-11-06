@extends('admin_layout/master')
@section('content')
                            <div class="nk-content ">
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content d-flex justify-content-between">
                                                <h4 class="title nk-block-title">Add Blogs Categories</h4>
                                                <div>
                                                    {{ Breadcrumbs::render('blogs-categories') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="row gy-4">
                                                    <form action="{{ url('admin-dashboard/blogs/categories/addProcc') }}" method="post">
                                                        @csrf
                                                    <div class="col-sm-6">
                                                        <input type="hidden" name="id" value="">
                                                    <div class="form-group">
                                                        <label class="form-label" for="name">Name</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" name="name" id="name"  placeholder="Category Name">
                                                        @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="save">
                                                        <button type="submit" class="btn btn-primary"> Save </button>
                                                    </div>
                                                    <div class="form-group d-none" id="update">
                                                        <button type="submit" class="btn btn-primary"> Update </button>
                                                        <button type="button" class="btn btn-primary addnew"> Add new </button>
                                                    </div>
                                                    </div>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Categories list</h4>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <table class="table table-orders">
                                                <thead class="tb-odr-head">
                                                    <tr class="tb-odr-item">
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-id">#</span>
                                                            <span class="tb-odr-date d-none d-md-inline-block">name</span>
                                                        </th>
                                                        <th class="tb-odr-amount">
                                                            <!-- <span class="tb-odr-total">Discount</span> -->
                                                            <!-- <span class="tb-odr-status d-none d-md-inline-block">Status</span> -->
                                                        </th>
                                                        <th class="tb-odr-action text-center">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tb-odr-body">
                                                    <?php $count = 1; ?>
                                                    @if(isset($categories))
                                                    @foreach($categories as $category)
                                                    <tr class="tb-odr-item">
                                                        <td class="tb-odr-info">
                                                            <span class="tb-odr-id">{{ $count++ }}</span>
                                                            <span class="tb-odr-date">{{ $category->name ?? '' }}</span>
                                                        </td>
                                                        <td class="tb-odr-action">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown">
                                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li><a data-id="{{ $category->id ?? '' }}"  name="{{ $category->name ?? '' }}" href="#" class="text-primary option-edit">Edit</a></li>
                                                                        <li><a link="{{ url('admin-dashboard/blog/category/delete/'.$category->id) }}" class="text-danger remove">Remove</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
<script>
    $('.option-edit').on('click',function(e){
        e.preventDefault();
        name = $(this).attr('name');
        id = $(this).attr('data-id');
        $('input[name="id"]').val(id);
        $('input[name="name"]').val(name);

        $('#save').addClass('d-none');
        $('#update').removeClass('d-none');
        $(window).scrollTop(0);
    });
    $('.addnew').on('click',function(){
        $('input[name="id"]').val('');
        $('input[name="name"]').val('');
        $('#save').removeClass('d-none');
        $('#update').addClass('d-none');
    })
    $('.remove').on('click',function(){
        link = $(this).attr('link');
        Swal.fire({
            title: 'Are you sure to delete this subscription?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            confirmButtonColor: '#008000',
            allowOutsideClick: false,
            allowEscapeKey: false
            }).then((result) => {
        if (result.isConfirmed) {

            window.location.href = link;
        } 
        });
    });
</script>
@endsection