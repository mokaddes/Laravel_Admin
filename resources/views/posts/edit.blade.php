@extends('layouts.master')
@section('title')
    Post Edit
@endsection
@section('content')
    <section class="content">
        <div class="container" style="padding-top: 30px">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-md-offset-1 mrgin-auto" >
                    <div class="pull-left btn btn-info">
                        Edit Post
                    </div>
                    <div class="pull-right">
                        <a href="{{route('posts.index')}}" class="btn btn-success">Back</a>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-1" style="margin-top:20px">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="detail" class="control-label">Details</label>
                                    <input type="text" name="detail" id="detail" class="form-control" value="{{$post->detail}}">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Submit" class="btn btn-info form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
