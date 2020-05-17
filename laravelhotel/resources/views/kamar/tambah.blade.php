@extends('master')

@section('title', 'Tambah Data')

@section('judul_halaman', 'Tambah Data Kamar')

@section('konten')
@extends('layouts.app')
    
    
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/kamar/simpan" method="post">
        {{ csrf_field() }}
        <br/>
        <div class="form-group">
            <label for="nama">No Kamar</label>
            <input type="text" class="form-control form-control-lg" required="required" name="nokamar" value="">
        </div>
        <div class="form-group">
            <label for="type">Type</label>
                <select id="type" class="form-control form-control-lg" name="type">
                        <option value="">---</option>
                        <option value="king">King</option>
                        <option value="double">Double</option>
                        <option value="single">Single</option>
                        <option value="queen">Queen</option>
                </select>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control form-control-lg" required="required" name="harga" value="">
        </div>
        <br/>
        <br/>
        <button type="submit" name="tambah" class="btn btn-primary float-right" style="font-size:12pt">Tambah Data</button>
    </form>
    <a href="/kamar" class="btn btn-danger" style="font-size:12pt">Kembali</a>
    
@endsection