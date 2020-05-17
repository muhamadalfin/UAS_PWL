@extends('master')

@section('title', 'Tambah Data')

@section('judul_halaman', 'Tambah Data Administrator')

@section('konten')
@extends('layouts.app')
    <a href="/administrator" class="btn btn-danger">Kembali</a>
    <br/>
    <br/>
    
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/administrator/simpan" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" required="required" name="nama" value="">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" required="required" name="username" value="">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" required="required" name="password" value="">
        </div>
        <div class="form-group">
            <label for="tlp">Telephone</label>
            <input type="number" class="form-control" required="required" name="tlp" value="">
        </div>
        <div class="form-group">
            <label for="level">Level</label>
                <select id="status" class="form-control" name="level">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
                <select id="status" class="form-control" name="status">
                        <option value="on">On</option>
                        <option value="off">Off</option>
                </select>
        </div>
        <!--div class="form-group">
            <label for="namamhs">Nama</label>
            <input type="text" class="form-control" name="namamhs" value="{{ old('namamhs')}}"> <br/>
        </div>
        <div class="form-group">
            <label for="nimmhs">Nim</label>
            <input type="number" class="form-control" name="nimmhs" value="{{ old('nimmhs')}}"> <br/>
        </div>
        <div class="form-group">
            <label for="emailmhs">E-mail</label>
            <input type="email" class="form-control" name="emailmhs" value="{{ old('emailmhs')}}"> <br/>
        </div>
        <div class="form-group">
            <label for="jurusanmhs">Jurusan</label>
            <input type="text" class="form-control" name="jurusanmhs" value="{{ old('jurusanmhs')}}"> <br/>
        </div-->
        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
    </form>
@endsection