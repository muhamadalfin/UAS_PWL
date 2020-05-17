@extends('master2')

@section('title', 'Home')

@section('judul_halaman', 'Data Reservasi')

@section('konten')
@extends('layouts.app')
    <!--a href="/kamar/tambah" class="btn btn-primary">Tambah Data Kamar</a-->
    <div class="row mt-3">
            <div class="col-md-12">
                <form action="/reservasi/cari" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Cari Data Reservasi" name="cari">
                        <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" style="font-size:10pt"><span class="glyphicon glyphicon-search"></button>
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <br/>
    <br/>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
            <th>No</th>
                <th>Nama</th>
                <th>KTP</th>
                <th>No Telephone</th>
                <th>Alamat</th>
                <th>No Kamar</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Action</th>
            <tr>
        </thead>
        <tbody>
            @foreach($Reservasi as $result)
            <tr>
            <td align = "center">{{ $result['id_reservasi'] }}</td>
                <td align = "center">{{ $result['nama'] }}</td>
                <td align = "center">{{ $result['ktp'] }}</td>
                <td align = "center">{{ $result['tlp'] }}</td>
                <td align = "center">{{ $result['alamat'] }}</td>
                <td align = "center">{{ $result['no_kamar'] }}</td>
                <td align = "center">{{ $result['tgl_masuk'] }}</td>
                <td align = "center">{{ $result['tgl_keluar'] }}</td>
                <td align = "center">
                    <a href="/reservasi/hapus/{{ $result['id_reservasi'] }}" class="badge badge-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection