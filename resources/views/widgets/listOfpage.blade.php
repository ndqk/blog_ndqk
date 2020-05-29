@if ($postFetchCate->hasPages())
    <div class="row pagination-wrap">
        <div class="col-full">
            <nav class="pgn" data-aos="fade-up">
                <ul class="list_pgn">
                    <?php 
                        $curr = $postFetchCate->currentPage();
                        $step = 2;
                        $start = 1;
                        $end = $postFetchCate->lastPage();
                        if($postFetchCate->lastPage() >= (2*$step + 1)){
                            if($curr - 1 >= $step){
                                $start = $curr - $step;
                            }
                            if($postFetchCate->total() - $curr < $step){
                                $start -= $step - ($postFetchCate->total() - $curr);
                            }
                            $end = $start + 2*$step;
                        }
                        
                    ?>
                    @if (!$postFetchCate->onFirstPage())
                        <li>
                            <a class="pgn__prev" href="{{$postFetchCate->previousPageUrl()}}">Prev</a>
                        </li>
                    @endif
                    @for ($i = $start; $i <= $end; $i++)
                        @if ($postFetchCate->currentPage() == $i)
                            <li>
                                <span class="pgn__num current">{{ $i }}</span>
                            </li>
                        @else  
                            <li>
                                <a class="pgn__num" href="{{$postFetchCate->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    @if ($paginator->hasMorePages())
                        <li>
                            <a class="pgn__next" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
</div>
@endif