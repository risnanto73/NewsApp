@extends('home.parent')

@section('content')
    {{-- alert success --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- alert error --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card p-4">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center">
                @if (empty(Auth::user()->profile->image))
                    <img class="w-75"
                        src="https://ui-avatars.com/api/background=0D8ABC&color=fff&name={{ Auth::user()->name }}"
                        alt="">
                @else
                    <img src="{{ Auth::user()->profile->image }}" alt="ini profile image">
                @endif
            </div>
            <div class="col-md-6 text-center">
                <h3>Profile Account</h3>
                <ul class="list-group">
                    {{-- // untuk menampilkan detail account user yang sedang login --}}
                    <li class="list-group-item">Name Account = <strong>{{ Auth::user()->name }}</strong></li>
                    {{-- // untuk menampilkan email account user yang sedang login --}}
                    <li class="list-group-item">E-Mail Account = <strong>{{ Auth::user()->email }}</strong></li>
                    {{-- // untuk menampilkan role account user yang sedang login --}}
                    <li class="list-group-item">Role Account = <strong>{{ Auth::user()->role }}</strong></li>
                </ul>
                @if (empty(Auth::user()->profile->image))
                    <a href="{{ route('createProfile') }}" class="btn btn-info mt-2">
                        <i class="bi bi-plus"></i>
                        Create Profile
                    </a>
                @else
                    <a href="{{ route('editProfile') }}" class="btn btn-warning mt-2">
                        <i class="bi bi-pencil"></i>
                        Edit Profile
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
