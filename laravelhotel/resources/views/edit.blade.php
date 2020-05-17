@extends('master')

@section('title', 'Edit Data')

@section('judul_halaman', 'Edit Data Administrator')

@section('konten')
@extends('layouts.app')
    
    <form action="/administrator/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id_user" value="{{ $Administrator['id_user'] }}">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" required="required" name="nama" value="{{ $Administrator['nama'] }}"> 
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" required="required" name="username" value="{{ $Administrator['username'] }}"> 
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" required="required" name="password" value="{{ $Administrator['password'] }}"> 
        </div>
        <div class="form-group">
            <label for="tlp">Telephone</label>
            <input type="number" class="form-control" required="required" name="tlp" value="{{ $Administrator['tlp'] }}">
        </div>
        <div class="form-group">
            <label for="level">Level</label>
                <select id="status" class="form-control" name="level">
                    @if($Administrator['level'] == "user" )
                        <option value="user" selected>User</option>
                        <option value="admin">Admin</option>
                    @else
                        <option value="user">User</option>
                        <option value="admin" selected>Admin</option>
                    @endif
                </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
                <select id="status" class="form-control" name="status">
                    @if($Administrator['status'] == "on" )
                        <option value="on" selected>On</option>
                        <option value="off">Off</option>
                    @else
                        <option value="on">On</option>
                        <option value="off" selected>Off</option>
                    @endif
                </select>
        </div>
        <button type="submit" name="edit" class="btn btn-primary float-right" style="font-size:12pt">Simpan Data</button>
    </form>

    <a href="/administrator" class="btn btn-danger" style="font-size:12pt">Kembali</a>
    
   
@endsection