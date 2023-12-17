@extends('master')

@section('konten')
    <div class="container">
        <h1>Edit User</h1>
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
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="admin" name="admin" value="1"
                        @if ($user->admin) checked @endif>
                    <label class="form-check-label" for="admin">Admin</label>
                </div>
            </div>



            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
@endsection
