@extends('admin_layout/master')
@section('content')
                            <div class="nk-content ">
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Add Subscriptions Options</h4>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="row gy-4">
                                                    <form action="{{ url('admin-dashboard/subscriptions-options/addProcc') }}">
                                                        @csrf
                                                    <div class="col-sm-6">
                                                        <input type="hidden" name="id" value="">
                                                    <div class="form-group">
                                                        <label class="form-label" for="recurring_period">Recurring Period</label>
                                                        <div class="form-control-wrap">
                                                            <input type="number" class="form-control" name="recurring_period" id="recurring_period" placeholder="Recurring Period">
                                                        @error('recurring_period')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="recurring_type">Recurring Type</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control" name="recurring_type" id="recurring_type" >
                                                                <option value="week">Weekly</option>
                                                                <option value="month">Monthly</option>
                                                            </select>
                                                        </div>
                                                        @error('recurring_type')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-05">Discount</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-text-hint">
                                                                <span class="overline-title">%</span>
                                                            </div>
                                                            <input type="number" class="form-control"  name="discount" id="discount" placeholder="Discount Off">
                                                        </div>
                                                        @error('discount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
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
                                                <h4 class="title nk-block-title">Subscriptions Options</h4>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <table class="table table-orders">
                                                <thead class="tb-odr-head">
                                                    <tr class="tb-odr-item">
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-id">#</span>
                                                            <span class="tb-odr-date d-none d-md-inline-block">Recurring time</span>
                                                        </th>
                                                        <th class="tb-odr-amount">
                                                            <span class="tb-odr-total">Discount</span>
                                                            <!-- <span class="tb-odr-status d-none d-md-inline-block">Status</span> -->
                                                        </th>
                                                        <th class="tb-odr-action">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tb-odr-body">
                                                    <?php $count = 1; ?>
                                                    @foreach($options as $option)
                                                    <tr class="tb-odr-item">
                                                        <td class="tb-odr-info">
                                                            <span class="tb-odr-id">{{ $count++ }}</span>
                                                            <span class="tb-odr-date">{{ $option->recurring_period ?? '' }} {{ $option->recurring_type ?? '' }}</span>
                                                        </td>
                                                        <td class="tb-odr-amount">
                                                            <span class="tb-odr-total">
                                                                <span class="amount">{{ $option->discount_percentage ?? '' }}%</span>
                                                            </span>
                                                            <span class="tb-odr-status">
                                                                <!-- <span class="badge badge-dot bg-success">Complete</span> -->
                                                            </span>
                                                        </td>
                                                        <td class="tb-odr-action">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown">
                                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                                    <ul class="link-list-plain">
                                                                        <li><a data-id="{{ $option->id ?? '' }}" percentage-off="{{ $option->discount_percentage ?? '' }}" recurring-period="{{ $option->recurring_period ?? '' }}" recurring-type="{{ $option->recurring_type ?? '' }}" href="#" class="text-primary option-edit">Edit</a></li>
                                                                        <li><a link="{{ url('admin-dashboard/subscriptions-options/delete/'.$option->id) }}" class="text-danger remove">Remove</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
<script>
    $('.option-edit').on('click',function(e){
        e.preventDefault();
        percentageoff = $(this).attr('percentage-off');
        recurringperiod = $(this).attr('recurring-period');
        recurringtype = $(this).attr('recurring-type');
        id = $(this).attr('data-id');
        $('input[name="id"]').val(id);
        $('input[name="recurring_period"]').val(recurringperiod);
        $('option[value="'+recurringperiod+'"]').attr("selected",true);
        $('input[name="discount"]').val(percentageoff);

        $('#save').addClass('d-none');
        $('#update').removeClass('d-none');
        $(window).scrollTop(0);
    });
    $('.addnew').on('click',function(){
        $('input[name="id"]').val('');
        $('input[name="recurring_period"]').val('');
        $('input[name="recurring_type"]').val('');
        $('input[name="discount"]').val('');
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

    })
</script>
@endsection