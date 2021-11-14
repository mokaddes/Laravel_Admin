@extends('layouts.master')
@section('title')
    Show Post
@endsection
@section('content')
<div class="container " style="padding-top:30px">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="pull-left btn btn-info">
                Show Post
            </div>
            <div class="pull-right ">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1" style="margin-top: 20px">
        <div class="  ">
            <div class="form-group">
                <strong>Author:</strong>
                {{ $post->user->name }}
            </div>
        </div>
        <div class="  ">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $post->title }}
            </div>
        </div>
        <div class="  ">
            <div class="form-group">
                <strong>Details:</strong>
                {{$post->detail}}
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
