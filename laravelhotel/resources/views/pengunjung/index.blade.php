@extends('master')

@section('title', 'Home')

@section('judul_halaman', 'Data Pengunjung')

@section('konten')
@extends('layouts.app')
    
    <div class="row mt-3">
            <div class="col-md-12">
                <form action="/pengunjung/cari" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Cari Data Pengunjung" name="cari">
                        <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" style="font-size:10pt"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <br/>
    <a href="/pengunjung/tambah" class="btn btn-primary" style="font-size:12pt"><span class="glyphicon glyphicon-plus" style="margin-right:4px"></span>Tambah Data Pengunjung</a>
    <br/>
    <br/>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>
            <tr>
        </thead>
        <tbody>
            @foreach($Pengunjung as $result)
            <tr>
                <td>{{ $result['id_pengunjung'] }}</td>
                <td>{{ $result['nama'] }}</td>
                <td>
                    <a href="/pengunjung/detail/{{ $result['id_pengunjung'] }}" class="badge badge-info">Detail</a>
                    <a href="/pengunjung/edit/{{ $result['id_pengunjung'] }}" class="badge badge-warning"><span class="glyphicon glyphicon-pencil"></a>
                    <a href="/pengunjung/hapus/{{ $result['id_pengunjung'] }}" class="badge badge-danger"><span class="glyphicon glyphicon-trash"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection