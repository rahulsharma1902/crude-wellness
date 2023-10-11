@extends('front_layout/master')
@section('content')

<section class="blog_wrapper blog_detial_wrapper m-0 p_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_content">
                        <div class="blog1_img">
                            <img src="{{ asset('front/img/blog-1.png') ?? '' }}" class="img-fluid" alt="">
                        </div>
                        <strong>October 2, 2023</strong>
                        <h4>Lorem Ipsum is simply dummy text of the printing</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                        </p>
                    </div>
                    <div class="inerblog_p">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                    </div>
                    <div class="blog_content">
                        <div>
                            <p>
                                Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                            </p>
                        </div>
                    </div>
                    <div class="prv_next_wreap">
                        <ul class="list-unstyled">
                            <li><a href="#" class="btn"><i class="fa-solid fa-arrow-left"></i> Previous Post</a>
                            </li>
                            <li class="active"><a href="#" class="btn">Next Post <i class="fa-solid fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar_wrapper">
                        <div class="recent_wreap">
                            <h5>Recent Posts</h5>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div>
                                    <h6>
                                        <a href="#">Lorem Ipsum is simply dummy text 
                                        of the printing</a>
                                    </h6>
                                    <p>
                                        October 2, 2023
                                    </p>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <h6>
                                        <a href="#">Lorem Ipsum is simply dummy text 
                                        of the printing</a>
                                    </h6>
                                    <p>
                                        October 2, 2023
                                    </p>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <h6>
                                        <a href="#">Lorem Ipsum is simply dummy text 
                                        of the printing</a>
                                    </h6>
                                    <p>
                                        October 2, 2023
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection