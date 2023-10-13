@extends('admin_layout/master')
@section('content')
<div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Add Faqs</h4>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <form action="{{ url('admin-dashboard/faqs/addProcc') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $editdata->id ?? '' }}">
                                            <div class="card-inner">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="title">Title</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" name="title" id="title" value="{{ $editdata->title ?? '' }}">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="slug">Slug</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" name="slug" id="slug" value="{{ $editdata->slug ?? '' }}" >
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="text">Text</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea class="form-control" name="text" id="text">{{ $editdata->text ?? '' }}</textarea>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                   </div>
                                                   <div class="row" id="qustiondiv">
                                                    @if(isset($editdata))
                                                        @if(!empty($editdata->questions) || !empty($editdata->answers))
                                                        <?php $questions = json_decode($editdata->questions);
                                                            $answers = json_decode($editdata->answers);
                                                            
                                                        ?>
                                                        <?php for($i = 0; $i<count($questions); $i++){ ?>
                                                        <div class="col-lg-6 html{{ $i+1 }}">
                                                            <hr>
                                                            <div class="d-flex justify-content-between">
                                                                <h6 class="overline-title title">Question {{ $i+1 }}</h6>
                                                                <button class="btn btn-link close" data-id='{{ $i+1 }}'>close</button>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="question">Question</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="question[]" id="question" value="{{ $questions[$i] ?? '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="answer">Answer</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control" name="answer[]" id="answer">{{ $answers[$i] ?? '' }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <?php } ?>
                                                        @endif
                                                    @endif                                                   
                                                    </div>
                                                   <div class="col-lg-6 mt-2">
                                                    <button type="button" class="btn btn-primary " id="addquestion">Add Question</button>
                                                   @if(isset($editdata))
                                                   <button type="submit" class="btn btn-primary">Update</button>
                                                   <a href="{{ url('admin-dashboard/faqs') }}" class="btn btn-primary">Add New</a>
                                                   @else
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    @endif
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                       
                                    </div>
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title">Faqs lists</h4>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <table class="table table-orders">
                                                <thead class="tb-odr-head">
                                                    <tr class="tb-odr-item">
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-id">#</span>
                                                            <span class="tb-odr-date d-none d-md-inline-block">Title</span>
                                                        </th>
                                                        <th class="tb-odr-amount">
                                                            <span class="tb-odr-total">Slug</span>
                                                            <!-- <span class="tb-odr-status d-none d-md-inline-block">Status</span> -->
                                                        </th>
                                                        <th class="tb-odr-action">&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tb-odr-body">
                                                    <?php $count = 1; ?>
                                                    @foreach($faqmeta as $meta)
                                                    <tr class="tb-odr-item">
                                                        <td class="tb-odr-info">
                                                            <span class="tb-odr-id">{{ $count++ }}</span>
                                                            <span class="tb-odr-date">{{ $meta->title ?? '' }}</span>
                                                        </td>
                                                        <td class="tb-odr-amount">
                                                            <span class="tb-odr-total">
                                                                <span class="amount">{{ $meta->slug ?? '' }}</span>
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
                                                                        <li><a href="{{ url('admin-dashboard/faqs/'.$meta->slug) }}" class="text-primary option-edit">Edit</a></li>
                                                                        <li><a link="{{ url('admin-dashboard/faqs/delete/'.$meta->id) }}" class="text-danger remove">Remove</a></li>
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
                                    <script>                                        
                                   $(document).ready(function(){
                                    i = 0;
                                        $('#addquestion').on('click',function(){
                                            i = i+1;
                                            html ='<div class="col-lg-6 html'+ i +'"><hr><div class="d-flex justify-content-between"><h6 class="overline-title title">Question '+ i +'</h6><button class="btn btn-link close" data-id='+ i +'>close</button></div><div class="form-group"><label class="form-label" for="question">Question</label><div class="form-control-wrap"><input type="text" class="form-control" name="question[]" id="question" ></div></div><div class="form-group"><label class="form-label" for="answer">Answer</label><div class="form-control-wrap"><textarea class="form-control" name="answer[]" id="answer"></textarea></div></div></div>';
                                            $('#qustiondiv').append(html);
                                        });
                                  
                                   $('body').delegate('.close','click',function(e){
                                    val = $(this).attr('data-id');
                                    $('.html'+val).remove();
                                   })
                                    });
                                   </script>
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
                                     $('.remove').on('click',function(){
                                        link = $(this).attr('link');
                                        Swal.fire({
                                            title: 'Are you sure to delete this faqs?',
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