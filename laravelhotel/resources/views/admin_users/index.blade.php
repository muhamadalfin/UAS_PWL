@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size:15pt"><center><span class="glyphicon glyphicon-user" style="margin-right:5px"></span>Users Info<center></div>

                <div class="card-body" style="margin:30px 135px 30px;">
                    @foreach ($users as $user)
                        {{ $user->name }} - {{ $user->email }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
