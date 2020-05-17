@extends('master')

@section('title', 'Detail Mahasiswa')

@section('judul_halaman', 'Detail Data Kamar')

@section('konten')
@extends('layouts.app')
    
    <h5 class="card-title" style="font-size:20pt"><center><span class="glyphicon glyphicon-bed"></span> {{ $Kamar['no_kamar'] }} </center></h5>
    <p class="card-text">
        <label for=""><b> Type : </b></label>
        {{ $Kamar['type'] }} </p>
    <p class="card-text">
        <label for=""><b> Harga : </b></label>
        {{ $Kamar['harga'] }} </p>

    <br/>
    <br/>
    <a href="/kamar" class="btn btn-danger" style="font-size:12pt">Kembali</a>
    
    
@endsection