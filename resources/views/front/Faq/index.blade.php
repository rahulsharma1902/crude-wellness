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
                            @if($faqmeta->isNotEmpty())
                            <?php $count = 0 ?>
                            @foreach($faqmeta as $meta)
                            <?php $count = $count+1;  ?>
                                <li class="nav-item">
                                    <a class="nav-link @if($count == 1) active @endif" id="pills-home-tab" data-toggle="pill" href="#{{ $meta->slug ?? '' }}" role="tab" aria-controls="pills-home" aria-selected="true">{{ $meta->title ?? '' }}</a>
                                </li>
                            @endforeach
                            @else
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Hemp Extract CBD </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Hemp Derived THC</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Products FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-privacy-tab" data-toggle="pill" href="#pills-privacy" role="tab" aria-controls="pills-privacy" aria-selected="false">Shipping</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-Recurring-tab" data-toggle="pill" href="#pills-Recurring" role="tab" aria-controls="pills-Recurring" aria-selected="false">Recurring Orders</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <?php $num = 0; ?>
                    @if($faqmeta->isNotEmpty())
                     @foreach($faqmeta as $meta)
                     <?php $num = $num+1; ?>
                        <div class="tab-pane fade @if($num == 1) show active @endif" id="{{ $meta->slug }}" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="extract_wreap">
                                <h4>{{ $meta->title ?? '' }}</h4>
                                
                            </div>
                            @if(isset($meta->questions) || isset($meta->answers))
                            <div id="main" class="terms_content_wreapper">
                                <div class="accordion accordion_wreap" id="faq">
                                    <?php 
                                    $questions = json_decode($meta->questions);
                                    $answers = json_decode($meta->answers);
                                    ?>
                                    @for($i = 0; $i < count($questions); $i++ )
                                    <div class="card">
                                        <div class="card-header" id="faqhead1">
                                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq{{ $i }}" aria-expanded="false" aria-controls="faq1">{{ $questions[$i] }}</a>
                                        </div>
                                        <div id="faq{{ $i }}" class="collapse " aria-labelledby="faqhead1" data-parent="#faq">
                                            <div class="card-body">
                                                <p>{{ $answers[$i] ?? '' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                    
                                </div>
                            </div>
                            @endif
                            @if(isset($meta->text))
                            <div>
                               <?php echo $meta->text; ?>
                            </div>
                            @endif
                        </div>
                    @endforeach
                    @else
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="extract_wreap">
                                <h4>Hemp Extract CBD</h4>
                                <p>
                                    Here are some of the most commonly asked questions from our customers over
                                    the last few years.
                                </p>
                            </div>
                            <div id="main" class="terms_content_wreapper">
                                <div class="accordion accordion_wreap" id="faq">
                                    <div class="card">
                                        <div class="card-header" id="faqhead1">
                                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq1" aria-expanded="false" aria-controls="faq1">What is CBD?</a>
                                        </div>
                                        <div id="faq1" class="collapse show" aria-labelledby="faqhead1" data-parent="#faq">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis animi sed
                                                    earum pariatur magni iusto, unde cumque officiis corporis impedit ipsa, accusantium
                                                    nostrum dolor saepe quidem blanditiis id facilis?
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="faqhead2">
                                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2" aria-expanded="false" aria-controls="faq2">Is CBD natural, clean?</a>
                                        </div>
                                        <div id="faq2" class="collapse" aria-labelledby="faqhead2" data-parent="#faq">

                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis animi sed
                                                    earum pariatur magni iusto, unde cumque officiis corporis impedit ipsa, accusantium
                                                    nostrum dolor saepe quidem blanditiis id facilis?
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">

                                        <div class="card-header" id="faqhead3">
                                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3" aria-expanded="false" aria-controls="faq3">Are your products legal in the US?</a>
                                        </div>

                                        <div id="faq3" class="collapse" aria-labelledby="faqhead3" data-parent="#faq">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis animi sed
                                                    earum pariatur magni iusto, unde cumque officiis corporis impedit ipsa, accusantium
                                                    nostrum dolor saepe quidem blanditiis id facilis?
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="faqhead4">
                                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq4" aria-expanded="false" aria-controls="faq4">What is the difference between CBD derived from hemp versus marijuana?</a>
                                        </div>

                                        <div id="faq4" class="collapse" aria-labelledby="faqhead4" data-parent="#faq">

                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis animi sed
                                                    earum pariatur magni iusto, unde cumque officiis corporis impedit ipsa, accusantium
                                                    nostrum dolor saepe quidem blanditiis id facilis?
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">

                                        <div class="card-header" id="faqhead4">
                                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq5" aria-expanded="false" aria-controls="faq5">Will I get high?</a>
                                        </div>

                                        <div id="faq5" class="collapse" aria-labelledby="faqhead5" data-parent="#faq">

                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis animi sed
                                                    earum pariatur magni iusto, unde cumque officiis corporis impedit ipsa, accusantium
                                                    nostrum dolor saepe quidem blanditiis id facilis?
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">

                                        <div class="card-header" id="faqhead6">
                                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq6" aria-expanded="false" aria-controls="faq6">Will I pass a drug test?</a>
                                        </div>

                                        <div id="faq6" class="collapse" aria-labelledby="faqhead6" data-parent="#faq">

                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis animi sed
                                                    earum pariatur magni iusto, unde cumque officiis corporis impedit ipsa, accusantium
                                                    nostrum dolor saepe quidem blanditiis id facilis?
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="faqhead7">
                                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq7" aria-expanded="false" aria-controls="faq7">Are there any contradictions with medication?</a>
                                        </div>
                                        <div id="faq7" class="collapse" aria-labelledby="faqhead6" data-parent="#faq">
                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique nobis animi sed
                                                    earum pariatur magni iusto, unde cumque officiis corporis impedit ipsa, accusantium
                                                    nostrum dolor saepe quidem blanditiis id facilis?
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div>
                                <h6>Lorem ipsum dolor sit amet</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                            <div>
                                <h6>Lorem ipsum dolor sit amet</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div>
                                <h6>Lorem ipsum dolor</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-privacy" role="tabpanel" aria-labelledby="pills-privacy-tab">
                            <div>
                                <h6>Lorem ipsum dolor sit amet</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                            <div>
                                <h6>Lorem ipsum dolor</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Recurring" role="tabpanel" aria-labelledby="pills-Recurring-tab">
                            <div>
                                <h6>Lorem ipsum dolor sit amet</h6>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection