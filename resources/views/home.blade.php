@include('widgets/header');
 <!-- featured 
    ================================================== -->
    <section class="s-featured">
        <div class="row">
            <div class="col-full">

                <div class="featured-slider featured" data-aos="zoom-in">

                    @foreach ($banners as $data)

                        <div class="featured__slide">
                            <div class="entry">

                                <div class="entry__background" style="background-image:url({{$data->post->spost_inimage}});"></div>
                                
                                <div class="entry__content">
                                    <span class="entry__category"><a href="/category/{{$data->post->category->cate_slug}}">{{$data->post->category->cate_name}}</a></span>

                                    <h1><a href="/category/{{$data->post->category->cate_slug}}/{{$data->post->spost_slug}}" title="">{{$data->post->spost_title}}</a></h1>

                                    <div class="entry__info">
                                        {{-- <a href="#0" class="entry__profile-pic">
                                            <img class="avatar" src="images/avatars/user-05.jpg" alt="">
                                        </a> --}}
                                        <ul class="entry__meta">
                                            <li><a href="#0">{{$data->post->spost_author}}</a></li>
                                            <li>{{$data->post->created_at}}</li>
                                        </ul>
                                    </div>
                                </div> <!-- end entry__content -->
                                
                            </div> <!-- end entry -->
                        </div> <!-- end featured__slide -->

                    @endforeach
                    
                </div> <!-- end featured -->

            </div> <!-- end col-full -->
        </div>
    </section> <!-- end s-featured -->


    <!-- s-content
    ================================================== -->
    <section class="s-content">
        
        <div class="row entries-wrap wide">
            <div class="entries">

                @foreach($homePosts as $data)
                    <article class="col-block">
                        
                        <div class="item-entry" data-aos="zoom-in">
                            <div class="item-entry__thumb">
                                <a href="/category/{{$data->category->cate_slug}}/{{$data->spost_slug}}" class="item-entry__thumb-link">
                                    <img src="{{$data->spost_image}}" >
                                </a>
                            </div>
            
                            <div class="item-entry__text">    
                                <div class="item-entry__cat">
                                    <a href="/category/{{$data->category->cate_slug}}">{{ $data->category->cate_name}}</a> 
                                </div>
        
                                <h1 class="item-entry__title"><a href="/category/{{$data->category->cate_slug}}/{{$data->spost_slug}}">{{$data->spost_title}}</a></h1>
                                
                                <div>
                                    By
                                    <a href="/category/{{$data->category->cate_slug}}/{{$data->spost_slug}}">{{$data->spost_author}}</a>
                                </div>

                                <div class="item-entry__date">
                                    <a href="/category/{{$data->category->cate_slug}}/{{$data->spost_slug}}">{{$data->created_at}}</a>
                                </div>
                            </div>
                        </div> <!-- item-entry -->

                    </article> <!-- end article -->

                @endforeach

            </div> <!-- end entries -->
        </div> <!-- end entries-wrap -->

        {{-- <div class="row pagination-wrap">
            <div class="col-full">
                <nav class="pgn" data-aos="fade-up">
                    <ul>
                        <li><a class="pgn__prev" href="#0">Prev</a></li>
                        <li><a class="pgn__num" href="#0">1</a></li>
                        <li><span class="pgn__num current">2</span></li>
                        <li><a class="pgn__num" href="#0">3</a></li>
                        <li><a class="pgn__num" href="#0">4</a></li>
                        <li><a class="pgn__num" href="#0">5</a></li>
                        <li><span class="pgn__num dots">…</span></li>
                        <li><a class="pgn__num" href="#0">8</a></li>
                        <li><a class="pgn__next" href="#0">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div> --}}

    </section> <!-- end s-content -->


@include('widgets/extra');
@include('widgets/footer');