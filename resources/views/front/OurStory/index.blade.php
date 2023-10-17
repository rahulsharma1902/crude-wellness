@extends('front_layout/master')
@section('content')

<section class="banner_wrapper p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner_content">
                        <div class="heading_wreap text-left">
                            
                            <?php echo($story->banner_text)  ?> 
                            
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
                        <?php echo($story->video_text)  ?> 
                        <div class="live_content" style="background-image: url('{{ asset('front/img/vode_img.png') ?? '' }}');">
                            <div class="video-box video_show">
                                <iframe src="{{ $story->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen="" style="display: none;" loading="lazy"></iframe>
                                <div class="video-thumb">
                                    <a href="#" class="video-icon video_click">
                                        <i class="fa-solid fa-play"><img src="{{ asset('/site_meta/'.$story->video_thumnail_image) }}" alt=""></i>
                                        <span class="animate-ping"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
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
                        <div>
                            <img src="{{ asset('/site_meta/'.$story->profile_image) ?? '' }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="lee_content">
                        <div class="bg_border">
                            <h4>{{ $story->profile_name }}</h4>
                            <samp>{{ $story->profile_position }}</samp>
                        </div>
                        <p> <?php echo($story->profile_text)  ?> </p>
                            
                        
                          
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="lee_tittle">
                        <p><?php echo($story->message)  ?>  </p>
                        {{-- <p>
                            <img src="{{ asset('front/img/dots.png') ?? '' }}" class="img-fluid" alt="">
                            “Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.”
                        </p> --}}
                        <strong>- {{ $story->profile_name }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection