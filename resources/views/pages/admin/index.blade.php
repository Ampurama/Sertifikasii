@extends('master')

@section('konten')
    <div class="container">
        <h1>User List</h1>
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false, 
                    timer: 1000 
                });
            </script>
        @endif

        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">Email: {{ $user->email }}</p>
                            <p class="card-text">
                                @if ($user->admin === 'True')
                                    Admin
                                @else
                                    User
                                @endif
                            </p>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                            <form class="d-inline" method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
