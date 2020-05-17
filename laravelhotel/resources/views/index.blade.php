@extends('master')

@section('title', 'Home')

@section('judul_halaman', 'Data Administrator')

@section('konten')
@extends('layouts.app')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="/administrator/cari" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Cari Data User" name="cari">
                        <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" style="font-size:10pt"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <br/>
    <a href="/administrator/tambah" class="btn btn-primary" style="font-size:12pt"><span class="glyphicon glyphicon-plus" style="margin-right:4px"></span>Tambah Data Administrator</a>
    <br/>
    <br/>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Action</th>
            <tr>
        </thead>
        <tbody>
            @foreach($Administrator as $result)
            <tr>
                <td>{{ $result['id_user'] }}</td>
                <td>{{ $result['nama'] }}</td>
                <td>{{ $result['username'] }}</td>
                <td>
                    <a href="/administrator/detail/{{ $result['id_user'] }}" class="badge badge-info">Detail</a>
                    <a href="/administrator/edit/{{ $result['id_user'] }}" class="badge badge-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="/administrator/hapus/{{ $result['id_user'] }}" class="badge badge-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection