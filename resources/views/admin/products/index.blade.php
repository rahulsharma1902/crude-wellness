@extends('admin_layout/master')
@section('content')
<div class="nk-block nk-block-lg" id="maindiv">
    <div class="nk-block-head">
        <div class="nk-block-head-content d-flex justify-content-between">
            <h4 class="nk-block-title">Products Table</h4>
            <div class="nk-block-des">
               {{ Breadcrumbs::render('products') }}
            </div>
        </div>
    </div>
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <button class="btn btn-danger my-1 delbtn d-none"><i class="bi bi-trash"></i></button>
            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false" id="table">
                <thead>
                  
                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext " id="maincheck">
                                <input type="checkbox" class="custom-control-input checkall" id="page-0">
                                <label class="custom-control-label" for="page-0"></label>
                            </div>
                        </th>
                        <th class="nk-tb-col"><span class="sub-text">Image</span></th>
                        <th class="nk-tb-col"><span class="sub-text">Product Name</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Slug</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Category</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-end">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $product )
                    
                    <tr class="nk-tb-item tr">
                  
                        <td class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input checkbox" id="" data-id="">
                                <label class="custom-control-label" for=""></label>
                            </div>
                        </td> 
                         <td class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <img src="{{ asset('productIMG/'.$product->featured_img) ?? '' }}" alt="">
                            </div>
                        </td>
                        
                        <td class="nk-tb-col">
                            <div class="user-card">
                                <div class="user-info">
                                  {{ $product->name ?? '' }}
                                </div>
                            </div>
                        </td>

                        <td class="nk-tb-col tb-col-mb">
                            <span class="tb-amount">
                                {{ $product->slug ?? '' }}
                            </span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                            <span>
                            {{ $product->category->name ?? '' }}
                            </span>
                        </td>
                    
                        <td class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="d-flex">
                                    <div class="custom-control custom-switch"  data-bs-toggle="tooltip" data-bs-placement="top" title="Show on Home page">
                                        <input type="radio" name="home_page_status" value="{{ $product->id ?? '' }}" class="custom-control-input homepageproduct" id="customSwitch{{ $product->id ?? '' }}" @if($product->home_page_status == 1) checked @endif>
                                        <label class="custom-control-label" for="customSwitch{{ $product->id ?? '' }}" ></label>
                                    </div>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                        
                                            <ul class="link-list-opt no-bdr">
                                                 <li><a href="{{ url('admin-dashboard/product-edit/'.$product->slug) ?? '' }}"><em class="icon ni ni-pen"></em><span>Edit</span></a></li>
                                              
                                                <li><a href="{{ url('productRemove/'.$product->slug) ?? '' }}" class="remove" data-id=""><em class="icon ni ni-trash"></em><span>Remove</span></a></li> 
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- .card-preview -->
</div> <!-- nk-block -->

<script>
    $('input.homepageproduct').on('change',function(){
       id = $(this).val();
       $.ajax({
        method: 'post',
        url: "{{ url('product/updatehomestatus') }}",
        data: { id:id,_token:"{{ csrf_token() }}" },
        success:function(response){
            NioApp.Toast(response.success, 'info', {position: 'top-right'});
        }
       })
    });

</script>
@endsection