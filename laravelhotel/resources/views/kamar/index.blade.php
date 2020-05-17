@extends('master')

@section('title', 'Home')

@section('judul_halaman', 'Data Kamar')

@section('konten')
@extends('layouts.app')
    
    <div class="row mt-3">
            <div class="col-md-12">
                <form action="/kamar/cari" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Cari Data Kamar" name="cari">
                        <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"style="font-size:10pt"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <br/>
    <a href="/kamar/tambah" class="btn btn-primary" style="font-size:12pt"><span class="glyphicon glyphicon-plus" style="margin-right:4px"></span>Tambah Data Kamar</a>
    <br/>
    <br/>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>No Kamar</th>
                <th>Type</th>
                <th>Action</th>
            <tr>
        </thead>
        <tbody>
            @foreach($Kamar as $result)
            <tr>
            <td>{{ $result['id_kamar'] }}</td>
                <td>{{ $result['no_kamar'] }}</td>
                <td>{{ $result['type'] }}</td>
                <td>
                    <a href="/kamar/detail/{{ $result['id_kamar'] }}" class="badge badge-info">Detail</a>
                    <a href="/kamar/edit/{{ $result['id_kamar'] }}" class="badge badge-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="/kamar/hapus/{{ $result['id_kamar'] }}" class="badge badge-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection