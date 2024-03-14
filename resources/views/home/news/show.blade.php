@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h5 class="card-title">
                {{ $news->title }} - <span class="badge rounded-pill bg-info text-white">{{ $news->category->name }}</span>
            </h5>
            <img src="{{ $news->image }}" alt="ini gambar berita" class="img-fluid">
            <div id="editor">
                {!! $news->content !!}
            </div>

            <script>
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    //disable editor
                    .then(editor => {
                        editor.isReadOnly = true;
                    })
            </script>

            <div class="container mt-2">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('news.index') }}" class="btn btn-info">
                        <i class="bi bi-arrow-left"></i>
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
