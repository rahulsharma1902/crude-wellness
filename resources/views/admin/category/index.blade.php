@extends('admin_layout/master')
@section('content')

<div class="nk-block nk-block-lg">
    <div class="nk-block-head">
        <div class="nk-block-head-content d-flex justify-content-between">
            <h4 class="nk-block-title">Categories List </h4>
            <div>
                {{ Breadcrumbs::render('categories') }}
            </div>
        </div>
    </div>
    <div class="card card-bordered card-preview">
        <table class="table table-tranx">
            <thead>
                <tr class="tb-tnx-head">
                    <th class="tb-tnx-id"><span class="">#</span></th>
                    <th class="tb-tnx-info">
                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                            <span>Category Name</span>
                        </span>
                        <span class="tb-tnx-date d-md-inline-block d-none">
                            <span class="d-md-none">Date</span>
                            <span class="d-none d-md-block">
                                <span>Slug</span>
                            </span>
                        </span>
                    </th>
                    <th>
                        <span class="">Parent Category</span>
                    </th>

                    <th class="tb-tnx-action">
                        <span>Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $s => $category)
                
                <tr class="tb-tnx-item">
                    <td class="tb-tnx-id">
                        <a href="#"><span>{{ $s+1 ?? '' }}</span></a>
                    </td>
                    <td class="tb-tnx-info">
                        <div class="tb-tnx-desc">
                            <span class="title">{{ $category->name ?? '' }}</span>
                        </div>
                        <div class="tb-tnx-date">
                            <span class="date">{{ $category->slug ?? '' }}</span>
                        </div>
                    </td>
                    <td>
                    <div class="tb-tnx-total">
                            <span class="amount">{{ $category->parentCategory['name'] ?? '-' }}</span>
                        </div>
                    </td>
                    <td class="tb-tnx-action">
                        <div class="dropdown">
                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em
                                    class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                <ul class="link-list-plain">
                                    <li><a href="{{ url('admin-dashboard/add-category/'.$category->slug) ?? '' }}">Edit</a></li>
                                    <li class="">
                                        
                                        <a class="removeCat" data-slug="{{$category->slug ?? '' }}" href="{{ url('remove-category/'.$category->slug) ?? '' }}">Remove</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div><!-- .card-preview -->
</div>
<script>
    $(document).ready(function () {
        $('.removeCat').on('click', function (e) {
            e.preventDefault();
        var slug = $(this).attr('data-slug');
        var url = "{{ url('remove-category') ?? '' }}"+'/'+slug;
            Swal.fire({
                title: 'Confirm Deletion',
                text: 'If you remove a parent category then its all child category has been removed ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    $(location).prop('href', url);
                }
            });
        });
    });
</script>


@endsection