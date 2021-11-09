@extends('layouts.master')
@section('title')
    Show|User
@endsection
@section('content')
<div class="container" style="padding-top:50px">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left btn btn-info">
                <h2 > Show User</h2>
            </div>
            <div class="pull-right ">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row" style="padding-top:50px">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h4 class="from-control">
                <strong>Profile images: </strong>
                <img src="/images/{{ $users->image }}" width="200px">
                </h4>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h4 class="header">
                <strong>Name:</strong>
                {{ $users->name }}
                </h4>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h4>
                <strong>Email:</strong>
                {{ $users->email }}
                </h4>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h4>
                <strong>Roles:</strong>
                @if($users->is_admin == 1)
                Admin
                @else
                User
                @endif
                </h4>
            </div>
        </div>
    </div>
</div>

@endsection
