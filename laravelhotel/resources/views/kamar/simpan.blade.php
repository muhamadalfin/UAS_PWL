@extends('master')

@section('title', 'Validasi Data')

@section('judul_halaman', 'Validasi Data Kamar')

@section('konten')
@extends('layouts.app')

<h3 class="my-4">Data Yang Di Input : </h3>
    <table class="table table-bordered table-striped">
        <tr>
            <td style="width:150px">No Kamar</td>
            <td>{{ $Kamar['no_kamar'] }}</td>
        </tr>
        <tr>
            <td>Type</td>
            <td>{{ $Kamar['type'] }}</td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>{{ $Kamar['harga'] }}</td>
        </tr>
    </table>

    <a href="/kamar" class="btn btn-primary">Kembali</a>
@endsection