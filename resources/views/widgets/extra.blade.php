
    <!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row">

            <div class="col-seven md-six tab-full popular">
                <h3>Popular Posts</h3>

                <div class="block-1-2 block-m-full popular__posts">

                    @foreach ($toppost as $post)

                        <article class="col-block popular__post">
                            <a href="/category/{{$post->post->category->cate_slug.'/'.$post->post->spost_slug}}" class="popular__thumb">
                                <img src="{!!URL::to('/')!!}/{{$post->post->spost_image}}" alt="">
                            </a>
                            <h5>{{$post->post->spost_title}}</h5>
                            <section class="popular__meta">
                                <span class="popular__author"><span>By</span> <a href="#0">{{$post->post->spost_author}}</a></span>
                                <span class="popular__date"><span>on</span> <time datetime="2018-06-14">{{$post->post->created_at}}</time></span>
                            </section>
                        </article>

                    @endforeach

                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->

            <div class="col-four md-six tab-full end">
                <div class="row">
                    <div class="col-six md-six mob-full categories">
                        <h3>Categories</h3>
        
                        <ul class="linklist">
                            @foreach($categories as $data)
                             <li><a href="/category/{{$data->cate_slug}}">{{$data->cate_name}}</a></li>
                            @endforeach
                        </ul>
                    </div> <!-- end categories -->
        
                    <div class="col-six md-six mob-full sitelinks">
                        <h3>Site Links</h3>
        
                        <ul class="linklist">
                            <li><a href="/">Home</a></li>
                            <li><a href="/standard-post">Blog</a></li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/contact">Contact</a></li>
                            {{-- <li><a href="#0">Privacy Policy</a></li> --}}
                        </ul>
                    </div> <!-- end sitelinks -->
                </div>
            </div>
        </div> <!-- end row -->

    </section> <!-- end s-extra -->