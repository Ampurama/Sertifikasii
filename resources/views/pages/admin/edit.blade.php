@extends('master')

@section('konten')
    <div class="container">
        <h1>Edit User</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $user->email) }}">
            </div>

            {{-- Add more form fields for other user attributes here --}}

            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
@endsection
