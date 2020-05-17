@extends('master')

@section('title', 'Detail Mahasiswa')

@section('judul_halaman', 'Detail Data Pengunjung')

@section('konten')
@extends('layouts.app')
    
    
    
    <h5 class="card-title" style="font-size:15pt"><center><span class="glyphicon glyphicon-user"></span> {{ $Pengunjung['nama'] }}</center> </h5>
    <br/>
    <p class="card-text">
        <label for=""><b> Alamat : </b></label>
        {{ $Pengunjung['alamat'] }} </p>
    <p class="card-text">
        <label for=""><b> Telephone : </b></label>
        {{ $Pengunjung['tlp'] }} </p>
    <p class="card-text">
        <label for=""><b> Ktp : </b></label>
        {{ $Pengunjung['ktp'] }} </p>

    <br/>
    <br/>
    <a href="/pengunjung" class="btn btn-danger" style="font-size:12pt">Kembali</a>
    
    
@endsection