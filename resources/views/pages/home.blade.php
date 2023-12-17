@extends('master')

@section('konten')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 text-center p-5 y-2">
            <h1 class="display-4">Selamat Datang, <b>{{ Auth::user()->name }}</b></h1>
            <p class="lead">Jangan lupa registrasi.</p>
            <a href="form-mahasiswa" class="btn btn-primary btn-lg">Registrasi</a>
        </div>
        <div class="col-md-6 p-1 y-4">
            <div style="width: 800px; overflow: hidden;">
                <img src="https://lh3.googleusercontent.com/p/AF1QipNyGgyft_BZwgNvjF4IxXqdNCNne0oWfbCSPLv_=s680-w680-h510" alt="Home Page Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@endsection
