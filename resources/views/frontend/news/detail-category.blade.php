@extends('frontend.parent')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9" data-aos="fade-up">
                    <h3 class="category-title">Category: {{ $detailCategory->name }}</h3>

                    @foreach ($detailCategory->news->sortByDesc('created_at') as $row)
                        <div class="d-md-flex post-entry-2 half">
                            <a href="{{ route('detailNews', $row->slug) }}" class="me-4 thumbnail">
                                <img src="{{ $row->image }}" alt=""
                                    class="img-fluid">
                            </a>
                            <div>
                                <div class="post-meta"><span class="date">{{ $detailCategory->name }}</span> <span
                                        class="mx-1">&bullet;</span>
                                    <span>{{ $row->created_at->format('d F Y') }}</span>
                                </div>
                                <h3><a href="{{ route('detailNews', $row->slug) }}">
                                    {{ $row->title }}</a></h3>
                                <p>
                                    {{ Str::limit(strip_tags($row->content), 200) }}
                                </p>
                                <div class="d-flex align-items-center author">
                                    <div class="photo"><img src="{{ asset('frontend/assets/img/person-2.jpg') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="name">
                                        <h3 class="m-0 p-0">Admin</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    <div class="aside-block">

                        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                            @foreach ($category as $row => $index)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $row == 0 ? 'active' : '' }}" id="pills-popular-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-popular{{ $index->id }}" type="button" role="tab"
                                        aria-controls="pills-popular{{ $index->id }}" aria-selected="true">{{ $index->name }}</button>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            @foreach ($category as $row => $index)
                                <div class="tab-pane fade show {{ $row == 0 ? 'active' : '' }}" id="pills-popular{{ $index->id }}"
                                    role="tabpanel" aria-labelledby="pills-popular-tab">
                                    @foreach ($index->news->sortByDesc('created_at')->take(3) as $news)
                                        <div class="post-entry-1 border-bottom">
                                            <div class="post-meta"><span class="date">{{ $index->name }}</span> <span
                                                    class="mx-1">&bullet;</span> <span>{{ $news->created_at->diffForHumans() }}</span></div>
                                            <h2 class="mb-2"><a href="{{ route('detailNews', $news->slug) }}">{{ $news->title }}</a></h2>
                                            <span class="author mb-3 d-block">Admin</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="aside-block">
                        <h3 class="aside-title">Video</h3>
                        <div class="video-post">
                            <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
                                <span class="bi-play-fill"></span>
                                <img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <!-- End Video -->

                    <div class="aside-block">
                        <h3 class="aside-title">Categories</h3>
                        <ul class="aside-links list-unstyled">
                            @foreach ($category as $row)
                                <li><a href="{{ route('detailCategory', $row->slug) }}"><i class="bi bi-chevron-right"></i>
                                        {{ $row->name }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- End Categories -->

                    <div class="aside-block">
                        <h3 class="aside-title">Tags</h3>
                        <ul class="aside-tags list-unstyled">
                            @foreach ($category as $row)
                                <li><a href="{{ route('detailCategory', $row->slug) }}">{{ $row->name }}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- End Tags -->

                </div>
            </div>
        </div>
    </section>
@endsection
