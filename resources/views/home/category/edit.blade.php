@extends('home.parent')

@section('content')

    <div class="row">
        <div class="card p-4">
            <h3>Edit Category</h3>

            <hr>

            {{-- menampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {{-- menampilkan error validasi --}}
                        {{-- jika terjadi error validasi --}}
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- menggunakan method put dan route update --}}
            <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                {{-- csrf sebagai token authentikasi --}}
                @csrf
                {{-- method jenis yang digunakan --}}
                @method('PUT')

                <div class="col-12">
                    <label for="inputName" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ $category->name }}">
                </div>

                <div class="col-12">
                    <label for="inputImage" class="form-label">Category Image</label>
                    <input type="file" class="form-control" id="inputImage" name="image">
                </div>

                {{-- button back --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ route('category.index') }}" class="btn btn-primary mt-2 mx-2">
                        <i class="bi bi-arrow-left"></i>
                        Back
                    </a>
                    <button type="submit" class="btn btn-warning mt-2">
                        <i class="bi bi-pencil"></i>
                        Update Category
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection
