@extends('front_layout/master')
@section('content')
<section class="banner_wrapper p_120" style="background-color: rgba(255, 165, 0, 0.11);background-image: unset;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner_content">
                    <div class="heading_wreap text-center">
                        <h2>Wellness Education</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="edtion_wrapper reviews_wrapper p_120 m-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h4>Browse Categories</h4>
                </div>
                <div class="terms_wreapper">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true">All </a>
                        </li>
                        @foreach($blogcategory as $category)
                          <span style="display: none"> {{ $posts = DB::table('blogs')->where('cat_id',$category->id)->get() }}</span>
                         @if($posts->isEmpty())
                         @else
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#{{$category->name}}"
                                role="tab" aria-controls="pills-profile" aria-selected="false">{{ $category->name }}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="blog_grid">
                            
                            @foreach($blogs as $blog)
                            <a href="{{ url('/education-details/'.$blog->slug) ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('/blog_images/'.$blog->image) }}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h6><?php  echo($blog->title)?></h6>
                                        <button href="" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @foreach ($blogcategory as $category )
                    <div class="tab-pane fade" id="{{$category->name}}" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="blog_grid">
                           <span style="display: none"> {{ $posts = DB::table('blogs')->where('cat_id',$category->id)->get() }}</span>
                            @foreach($posts as $post)
                            <a href="{{ url('/education-details/'.$blog->slug) ?? '' }}">
                                <div class="card bg-dark text-white">
                                    <img src="{{ asset('/blog_images/'.$post->image) ?? '' }}" class="card-img" alt="..." height="500px" width="500px">
                                    <div class="card-img-overlay">
                                        <h6><?php echo($post->title) ?></h6>
                                        <button href="#" class="btn ligt_btn">Read More</button>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('pills-profile-tab').on('click', function () {
            var selected = $(this).text();
            var cat = <?php echo json_encode($blogcategory); ?>[selectedSize];
            $('.tab-pane fade').attr('id' , cat);
           
        });
    });
</script>
@endsection