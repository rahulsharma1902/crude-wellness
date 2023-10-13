@extends('admin_layout/master')
@section('content')
<div class="nk-block nk-block-lg" id="maindiv">
    <div class="nk-block-head d-flex justify-content-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Products Table</h4>
            <div class="nk-block-des">
                <p><code class="code-class"></code> </p>
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
                                <li>
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
@endsection