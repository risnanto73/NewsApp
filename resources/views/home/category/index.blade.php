@extends('home.parent')

@section('content')
    <div class="row">
        <div class="card p-4">
            <h3>Category Index</h3>


            <div class="d-flex justify-content-end">
                <a href="{{ route('category.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i>
                    Create Category</a>
            </div>

            {{-- menampilkan alert success --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="container mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Category</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- menampilkan data dari mode menggunakan foreach atau perulangan --}}
                                @foreach ($category as $row)
                                    <tr>
                                        <td>
                                            {{-- menampilkan nomor urut --}}
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{-- menampilkan data name --}}
                                            {{ $row->name }}
                                        </td>
                                        <td>
                                            {{-- menampilkan data slug --}}
                                            {{ $row->slug }}
                                        </td>
                                        <td>
                                            {{-- menampilkan data image --}}
                                            <img src="{{ url($row->image) }}" alt="Image" width="100px">
                                        </td>
                                        <td>
                                            {{-- menampilkan tombol aksi --}}
                                            {{-- tombol aksi berupa view, edit, dan delete --}}

                                            {{-- tombol modal view menggunakan route.show dengan parameter id --}}
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#basicModal{{ $row->id }}">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            @include('home.category.include.modal-show')
                                            {{-- tombol edit menggunakan route.edit dengan parameter id --}}
                                            <a href="{{ route('category.edit', $row->id) }}" class="btn btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            {{-- tombol delete menggunakan route.destroy dengan parameter id --}}
                                            <form action="{{ route('category.destroy', $row->id) }}" method="post"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure to delete this category?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- menampilkan pagination boostrap --}}
                        {{ $category->links('pagination::bootstrap-5') }}


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
