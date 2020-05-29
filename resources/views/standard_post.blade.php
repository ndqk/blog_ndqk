@include('widgets/header');

    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding s-content--narrow">

        <article class="row entry format-standard">

            <div class="entry__media col-full">
                <div class="entry__post-thumb">
                    <img src="{!!URL::to('/')!!}/{{$spost->spost_inimage}}" >
                </div>
            </div>

            <div class="entry__header col-full">
                <h1 class="entry__header-title display-1">
                    {{$spost->spost_title}}
                </h1>
                <ul class="entry__header-meta">
                    <li class="date">{{$spost->created_at}}</li>
                    <li class="byline">
                        By
                        <a href="#0">{{$spost->spost_author}}</a>
                    </li>
                </ul>
            </div>

            <div class="col-full entry__main">

                <p class="lead drop-cap">{{$spost->spost_content}}</p>
                
                <div class="entry__taxonomies">
                    <div class="entry__cat">
                        <h5>Posted In: </h5>
                        <span class="entry__tax-list">
                            {{$spost->category->cate_name}}
                        </span>
                    </div> <!-- end entry__cat -->

                    <div class="entry__tags">
                        <h5>Tags: </h5>
                        <span class="entry__tax-list entry__tax-list--pill">
                            {{$spost->spost_tag}}
                        </span>
                    </div> <!-- end entry__tags -->
                </div> <!-- end s-content__taxonomies -->

                <div class="entry__author">
                    <img src="images/avatars/user-03.jpg" alt="">

                    <div class="entry__author-about">
                        <h5 class="entry__author-name">
                            <span>Posted by</span>
                            <a href="#0">{{$spost->spost_author}}</a>
                        </h5>

                        <div class="entry__author-desc">
                            <p>
                            Alias aperiam at debitis deserunt dignissimos dolorem doloribus, fuga fugiat 
                            impedit laudantium magni maxime nihil nisi quidem quisquam sed ullam voluptas 
                            voluptatum. Lorem ipsum dolor sit.
                            </p>
                        </div>
                    </div>
                </div>

            </div> <!-- s-entry__main -->

        </article> <!-- end entry/article -->


        <div class="s-content__entry-nav">
            <div class="row s-content__nav">
                <div class="col-six s-content__prev">
                    <a href="#0" rel="prev">
                        <span>Previous Post</span>
                        The Pomodoro Technique Really Works. 
                    </a>
                </div>
                <div class="col-six s-content__next">
                    <a href="#0" rel="next">
                        <span>Next Post</span>
                        3 Benefits of Minimalism In Interior Design.
                    </a>
                </div>
            </div>
        </div> <!-- end s-content__pagenav -->

        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">
                        {{$spost->spost_comment_count > 1 ? $spost->spost_comment_count.' Comments' : $spost->spost_comment_count.' Comment' }} 
                    </h3>
                    
                    <!-- START commentlist -->
                    <ol class="commentlist">

                        @foreach($comments as $comment)

                            <li class="depth-1 comment">

                                <div class="comment__avatar">
                                <img class="avatar" src="{!!URL::to('/')!!}/images/avatars/user-01.jpg" alt="" width="50" height="50">
                                </div>

                                <div class="comment__content">

                                    <div class="comment__info">
                                        <div class="comment__author">{{$comment->comment_author}}</div>

                                        <div class="comment__meta">
                                            <div class="comment__time">{{$comment->created_at}}</div>
                                            {{-- <div class="comment__reply">
                                                <a class="comment-reply-link" href="#0">Reply</a>
                                            </div> --}}
                                        </div>
                                    </div>

                                    <div class="comment__text">
                                    <p>
                                        {{$comment->comment_content}}    
                                    </p>
                                    </div>

                                </div>

                            </li> <!-- end comment level 1 -->

                        @endforeach

                    </ol>
                    <!-- END commentlist -->           

                </div> <!-- end col-full -->
            </div> <!-- end comments -->

            <div class="row comment-respond">

                <!-- START respond -->
                <div id="respond" class="col-full">

                    <h3 class="h2">Add Comment <span>Your email address will not be published</span></h3>

                    <form name="contactForm" id="contactForm" method="post" action="{{ url('/comment',$spost->spost_id) }}" autocomplete="off">
                        <fieldset>
                            {{ csrf_field()}}
                            <div class="form-field">
                                <input name="cName" id="cName" class="full-width" placeholder="Your Name*" value="" type="text" required>
                            </div>

                            <div class="form-field">
                                <input name="cEmail" id="cEmail" class="full-width" placeholder="Your Email*" value="" type="text" required>
                            </div>

                            <div class="message form-field">
                                <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message*" required></textarea>
                            </div>

                            <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Add Comment" type="submit">

                        </fieldset>
                    </form> <!-- end form -->

                </div>
                <!-- END respond-->

            </div> <!-- end comment-respond -->

        </div> <!-- end comments-wrap -->

    </section> <!-- end s-content -->



@include('widgets/extra');
@include('widgets/footer');