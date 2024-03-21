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
            </div>
        </div>
    </section>
@endsection
