@extends('master')

@section('title', 'Edit Data')

@section('judul_halaman', 'Edit Data Kamar')

@section('konten')
@extends('layouts.app')

    <form action="/kamar/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_kamar" value="{{ $Kamar['id_kamar'] }}">
        <div class="form-group">
            <label for="nokamar">No Kamar</label>
            <input type="text" class="form-control" required="required" name="nokamar" value="{{ $Kamar['no_kamar'] }}"> 
        </div>
        <div class="form-group">
            <label for="type">Type</label>
                <select id="type" class="form-control" name="type">
                    @if($Kamar['type'] == "king" )
                        <option value="king" selected>King</option>
                        <option value="double">Double</option>
                        <option value="single">Single</option>
                        <option value="queen">Queen</option>
                    @elseif($Kamar['type'] == "double" )
                        <option value="king">King</option>
                        <option value="double" selected>Double</option>
                        <option value="single">Single</option>
                        <option value="queen">Queen</option>
                    @elseif($Kamar['type'] == "single" )
                        <option value="king">King</option>
                        <option value="double">Double</option>
                        <option value="single" selected>Single</option>
                        <option value="queen">Queen</option>
                    @else
                    <option value="king">King</option>
                        <option value="double">Double</option>
                        <option value="single">Single</option>
                        <option value="queen" selected>Queen</option>
                    @endif
                </select>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" required="required" name="harga" value="{{ $Kamar['harga'] }}">
        </div>

        <button type="submit" name="edit" class="btn btn-primary float-right" style="font-size:12pt">Simpan Data</button>
    </form>
    <a href="/kamar" class="btn btn-danger" style="font-size:12pt">Kembali</a>
    
   
@endsection