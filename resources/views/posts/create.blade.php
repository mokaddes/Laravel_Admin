@extends('layouts.master')
@section('title')
    New Post
@endsection
@section('content')
    <section class="content">
        <div class="container" style="padding-top: 30px">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left btn btn-info">
                        Added Post
                    </div>
                    <div class="pull-right">
                        <a href="{{route('posts.index')}}" class="btn btn-success">Back</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>

                        <div class="panel-body" style="margin-top:50px">
                            <form method="post" action="{{ route('posts.store') }}" enctype='multipart/form-data'>
                            @csrf
                                <div class="form-group">
                                    <label class="control-label">Title</label>
                                    <input type="text" class="form-control" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Detail</label>
                                    <input type="detail" class="form-control" name="detail" required>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-info" value="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
