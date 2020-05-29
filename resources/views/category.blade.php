@include('widgets/header');

    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                @isset($cate)
                    <h1 class="display-1 display-1--with-line-sep">{{ $cate ? 'Category: '.$cate->cate_name : 'Standard Posts'}}</h1>
                    <p class="lead">Dolor similique vitae. Exercitationem quidem occaecati iusto. Id non vitae enim quas error dolor maiores ut. Exercitationem earum ut repudiandae optio veritatis animi nulla qui dolores.</p>
                @endisset
                @isset($search)
                    <h1 class="display-1 display-1--with-line-sep">Search: {{$search}}</h1>
                @endisset
            </div>
        </div>
        
        <div class="row entries-wrap add-top-padding wide">
            <div class="entries" 
                @if (sizeof($posts) < 1)
                    style="justify-content: center"
                @endif
            >
                @if (sizeof($posts) < 1)
                    <p>Không tìm thấy bài viết nào.</p>
                @endif
                @foreach($posts as $data)

                    <article class="col-block">
                        
                        <div class="item-entry" data-aos="zoom-in">
                            <div class="item-entry__thumb">
                                <a href="/category/{{$data->category->cate_slug}}/{{$data->spost_slug}}" class="item-entry__thumb-link">
                                    <img src="{!!URL::to('/')!!}/{{$data->spost_image}}">
                                </a>
                            </div>
            
                            <div class="item-entry__text">
                                <div class="item-entry__cat">
                                    <a href="/category/{{$data->category->cate_slug}}">{{$data->category->cate_name}}</a> 
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

        {{$posts->links('widgets/listOfpage', ['postFetchCate' => $posts])}}

    </section> <!-- end s-content -->

@include('widgets/extra');
@include('widgets/footer');
{{-- <script>
    $(function(){
        $('.pgn').on('click', '.list_pgn li a',function(e){
            e.preventDefault();
            var url= $(this).attr('href');
            $.ajax({
                type : 'GET',
                url : url,
                success : function(data){
                    $('html').html(data);
                    // $('html, body').animate({scrollTop: '0px'}, 0);
                }
            });
        })
    });
</script> --}}