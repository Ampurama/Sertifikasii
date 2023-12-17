@extends('master')

@section('konten')
    <div style="position: relative;">
        <img src="https://lh3.googleusercontent.com/p/AF1QipNyGgyft_BZwgNvjF4IxXqdNCNne0oWfbCSPLv_=s680-w680-h510"
            alt="Home Page Image" class="img-fluid" style="position: absolute; top: 0; left: 0; width: 100%; height: auto;">
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false, // Remove the "OK" button
                timer: 1000 // Set the duration in milliseconds (e.g., 3 seconds)
            });
        </script>
    @endif
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center p-3 y-5"
                style="background-color: rgba(255, 255, 255, 0.8); box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
                <h1 class="display-5">Selamat Datang, <b>{{ Auth::user()->name }}</b></h1>
                <p class="lead">Jangan lupa registrasi.</p>
                <a href="form-mahasiswa" class="btn btn-primary btn-lg">Registrasi</a>
            </div>
        </div>
    </div>
@endsection
