@extends('master')

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Selamat Datang, <b>{{ Auth::user()->name }}</b></h4>
                
            </div>
        </div>


       
@endsection
