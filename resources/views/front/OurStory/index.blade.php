@extends('front_layout/master')
@section('content')

<section class="banner_wrapper p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner_content">
                        <div class="heading_wreap text-left">
                            @if(isset($ourstory->banner_text))
                            <?php echo $ourstory->banner_text; ?>
                            @else
                            <h2>Healthy Living Is Better Living</h2>
                            <p>
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="story_wrapper p_120 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="story_text text-center">
                        @if(isset($ourstory->video_text))
                            <?php echo $ourstory->video_text; ?>
                        @else
                        <h4>Why We Started Crude</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        @endif
                        @if(isset($ourstory->video_link))
                        <div class="live_content" style="background-image: url('{{ asset('site_meta') }}/{{ $ourstory->video_thumnail_image ?? '' }}');">
                            <div class="video-box video_show">
                                <iframe src="{{ $ourstory->video_link ?? '' }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen="" style="display: none;" loading="lazy"></iframe>
                                <div class="video-thumb">
                                    <a href="#" class="video-icon video_click">
                                        <i class="fa-solid fa-play"></i>
                                        <span class="animate-ping"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="live_content" style="background-image: url('{{ asset('front/img/vode_img.png') ?? '' }}');">
                            <div class="video-box video_show">
                                <iframe src="https://www.youtube.com/embed/dXV4qzQ0ZYs?si=h6Lo0FUog_t2rWJt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen="" style="display: none;" loading="lazy"></iframe>
                                <div class="video-thumb">
                                    <a href="#" class="video-icon video_click">
                                        <i class="fa-solid fa-play"></i>
                                        <span class="animate-ping"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="lee_wrapper p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-center">
                        @if(isset($ourstory->profile_image))
                        <div>
                            <img src="{{ asset('site_meta') }}/{{ $ourstory->profile_image ?? '' }}" class="img-fluid" alt="">
                        </div>
                        @else
                        <div>
                            <img src="{{ asset('front/img/leee.png') }}" class="img-fluid" alt="">
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="lee_content">
                        <div class="bg_border">
                            <h4>{{ $ourstory->profile_name ?? 'Lee Dellinger' }}</h4>
                            <samp>{{ $ourstory->profile_position ?? 'Founder' }}</samp>
                        </div>
                        @if(isset($ourstory->profile_text))
                        <?php print_r($ourstory->profile_text); ?>
                        @else
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                        </p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="lee_tittle">
                        <p>
                            <img src="{{ asset('front/img/dots.png') ?? '' }}" class="img-fluid" alt="">
                            @if(isset($ourstory->profile_message))
                            “<?php print_r($ourstory->profile_message); ?>”
                            @else
                            “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.”
                            @endif
                        </p>
                        <strong>- {{ $ourstory->profile_name ??'Lee Dellinger' }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection