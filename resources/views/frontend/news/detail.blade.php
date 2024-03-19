@extends('frontend.parent')

@section('content')
    <div class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">
                    <div class="single-post">
                        <div class="post-meta"><span class="date"></span> <span class="mx-1">&bullet;</span>
                            <span>{{ $news->created_at->diffForHumans() }}</span></div>
                        <h1 class="mb-5">
                            {{ $news->title }}
                        </h1>
                        <p><span class="firstcharacter">L</span>

                            {!! str_replace('<figure>', '<iframe>', str_replace('</figure>', '</iframe>', $news->content)) !!}

                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
