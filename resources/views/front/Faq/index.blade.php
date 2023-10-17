@extends('front_layout/master')
@section('content')
<section class="banner_wrapper p_120" style="background-color: rgba(255, 165, 0, 0.11);background-image: unset;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner_content">
                        <div class="heading_wreap text-center">
                            <h2>FAQ About CBD</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="terms_wreapper reviews_wrapper p_120 m-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="terms_wreapper">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            @foreach($faqs as $f)

                           
                            <li class="nav-item">
                                <a class="nav-link @if ($loop->first) active @endif" id="pills-profile-tab" data-toggle="pill" href="#{{ $f->title }}" role="tab" aria-controls="pills-profile" aria-selected="false">{{ $f->title }}</a>
                            </li>
                           
                            @endforeach
                            
                        </ul>
                    </div>
                    
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="extract_wreap">
                                <p>
                                    <?php echo($faq->text ) ?>
                                </p>
                            </div>
                            <div id="main" class="terms_content_wreapper">
                                <div class="accordion accordion_wreap" id="faq">
                                    {{-- @foreach($faq->questions as $q) --}}
                                    @php
                                    $dataqus = json_decode($faq->questions, true);
                                    $dataans = json_decode($faq->answers, true); 
                                    @endphp
                                    @if($dataqus)
                                    @for ($i=0; $i<count($dataqus); $i++ )
                                     <div class="card">
                                        <div class="card-header" id="faqhead1">
                                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq1" aria-expanded="false" aria-controls="faq1">{{ $dataqus[$i] }}</a>
                                        </div>
                                        
                                        <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                                            <div class="card-body">
                                                <p>{{ $dataans[$i] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>
                        @foreach ($faqs as $f)
                        <div class="tab-pane fade" id="{{ $f->title }}" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div>
                                
                                <p><?php echo($f->text) ?></p>
                                  
                            </div>
                            <div id="main" class="terms_content_wreapper">
                                <div class="accordion accordion_wreap" id="faq">
                                    {{-- @foreach($faq->questions as $q) --}}
                                    @php
                                    $dataqus = json_decode($f->questions, true);
                                    $dataans = json_decode($f->answers, true); 
                                    @endphp
                                    @if($dataqus)
                                    @for ($i=0; $i<count($dataqus); $i++ )
                                     <div class="card">
                                        <div class="card-header" id="faqhead1">
                                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq1" aria-expanded="false" aria-controls="faq1">{{  $dataqus[$i]  }}</a>
                                        </div>
                                        
                                        <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                                            <div class="card-body">
                                                <p>{{ $dataans[$i] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection