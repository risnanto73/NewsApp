@extends('frontend.parent')

@section('content')
    @foreach ($category as $row)
        <section class="category-section">
            <div class="container" data-aos="fade-up">

                {{-- // Show category name and see all link --}}
                <div class="section-header d-flex justify-content-between align-items-center mb-5">
                    <h2>{{ $row->name }}</h2>
                    <div>
                        <a href="#" class="more">See All {{ $row->name }}</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">

                        {{-- // get news first 1 news from category id --}}
                        {{-- // $row->news is a relationship method --}}
                        {{-- // news is a method in Category model --}}

                        @foreach ($row->news->take(1) as $news)
                            <div class="d-lg-flex post-entry-2">
                                <a href="#" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                                    <img src="{{ $news->image }}" alt=""
                                        class="img-fluid">
                                </a>
                                <div>
                                    <div class="post-meta"><span class="date">{{ $row->name }}</span> <span
                                            class="mx-1">&bullet;</span>
                                        <span>Jul 5th '22</span>
                                    </div>
                                    <h3><a href="#">{{ $news->title }}</a></h3>
                                    <p>
                                        {{-- news content limit 100 without tag  --}}
                                        {{ Str::limit(strip_tags($news->content), 200) }}
                                    </p>
                                    <div class="d-flex align-items-center author">
                                        <div class="photo"><img src="assets/img/person-2.jpg" alt=""
                                                class="img-fluid">
                                        </div>
                                        <div class="name">
                                            <h3 class="m-0 p-0">Wade Warren</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- // get news random 2 news from category id --}}
                        
                        <div class="row">
                            <div class="col-lg-4">
                                @foreach ($row->news->random(1) as $news)
                                <div class="post-entry-1 border-bottom">
                                    <a href="#"><img
                                            src="{{ $news->image }}" alt=""
                                            class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">{{ $row->name }}</span> <span
                                            class="mx-1">&bullet;</span> <span>{{ $news->created_at }}</span></div>
                                    <h2 class="mb-2"><a href="#">{{ $news->title }}</a></h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                    <p class="mb-4 d-block">
                                        {{ Str::limit(strip_tags($news->content), 100) }}
                                    </p>
                                </div>
                                @endforeach

                                @foreach ($row->news->random(1) as $news)
                                <div class="post-entry-1">
                                    <div class="post-meta"><span class="date">{{ $row->name }}</span> <span
                                            class="mx-1">&bullet;</span> <span>{{ $news->created_at }}</span></div>
                                    <h2 class="mb-2"><a href="#">{{ $news->title }}</a>
                                    </h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-lg-8">
                                @foreach ($row->news->random(1) as $news)
                                <div class="post-entry-1">
                                    <a href="#"><img
                                            src="{{ $news->image }}" alt=""
                                            class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">{{ $row->name }}</span> <span
                                            class="mx-1">&bullet;</span> <span>{{ $news->created_at }}</span></div>
                                    <h2 class="mb-2">
                                        <a href="#">
                                            {{ $news->title }}
                                        </a>
                                    </h2>
                                    <span class="author mb-3 d-block">Jenny Wilson</span>
                                    <p class="mb-4 d-block">
                                        {{ Str::limit(strip_tags($news->content), 100) }}
                                    </p>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <div class="col-md-3">

                        {{-- // get news from category id --}}
                        {{-- // $row->news is a relationship method --}}
                        {{-- // news is a method in Category model --}}

                        @foreach ($row->news as $news)
                            <div class="post-entry-1 border-bottom">
                                <div class="post-meta"><span class="date">{{ $row->name }}</span> <span
                                        class="mx-1">&bullet;</span>
                                    <span>{{ $news->created_at }}</span>
                                </div>
                                <h2 class="mb-2"><a href="#">
                                        {{ $news->title }}
                                    </a></h2>
                                <span class="author mb-3 d-block">Jenny Wilson</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection
