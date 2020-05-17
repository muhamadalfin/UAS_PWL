@extends('master')

@section('title', 'Detail Mahasiswa')

@section('judul_halaman', 'Detail Data Administrator')

@section('konten')
@extends('layouts.app')
    
    <h5 class="card-title" style="font-size:15pt"><center><span class="glyphicon glyphicon-user"></span> {{ $Administrator['nama'] }} </center> </h5>
    <br/>
    <p class="card-text">
        <label for=""><b> Username : </b></label>
        {{ $Administrator['username'] }} </p>
    <p class="card-text">
        <label for=""><b> Password : </b></label>
        {{ $Administrator['password'] }} </p>
    <p class="card-text">
        <label for=""><b> Telephone : </b></label>
        {{ $Administrator['tlp'] }} </p>
    <p class="card-text">
        <label for=""><b> Level : </b></label>
        {{ $Administrator['level'] }} </p>
    
    <br/>
    <br/>
    <a href="/administrator" class="btn btn-danger" style="font-size:12pt">Kembali</a>
    
@endsection