@extends('master')

@section('title', 'Edit Data')

@section('judul_halaman', 'Edit Data Pengunjung')

@section('konten')
@extends('layouts.app')
    
    <form action="/pengunjung/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_pengunjung" value="{{ $Pengunjung['id_pengunjung'] }}">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" required="required" name="nama" value="{{ $Pengunjung['nama'] }}"> 
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" required="required" name="alamat" value="{{ $Pengunjung['alamat'] }}"> 
        </div>
        <div class="form-group">
            <label for="ktp">Ktp</label>
            <input type="text" class="form-control" required="required" name="ktp" value="{{ $Pengunjung['ktp'] }}"> 
        </div>
        <div class="form-group">
            <label for="tlp">Telephone</label>
            <input type="number" class="form-control" required="required" name="tlp" value="{{ $Pengunjung['tlp'] }}">
        </div>

        <button type="submit" name="edit" class="btn btn-primary float-right" style="font-size:12pt">Simpan Data</button>
    </form>
   
    <a href="/pengunjung" class="btn btn-danger" style="font-size:12pt">Kembali</a>
@endsection