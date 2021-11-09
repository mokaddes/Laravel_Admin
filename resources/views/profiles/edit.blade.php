@extends('layouts.master')
@section('title')
    Profile|Update
@endsection
@section('content')
<div class="container" style="padding-top:50px">
  <div class="row">
    <div class="col-lg-12">
        <div class="pull-left btn btn-info">
            <h2> Update Profile</h2>
        </div>
        <div class="pull-right ">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
  </div>
  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="container">
          <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <div class="panel panel-default">
                      <div class="panel-heading"></div>

                      <div class="panel-body" style="margin-top:50px">
                          <form action="{{route('profiles.update', $profiles->id)}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                                <div class="form-group">
                                    <input type="text" placeholder="name" name="name" class="form-control" value="{{Auth::user()->name}}" required>
                                </div>

                                <div class="form-group">
                                    <input type="email" placeholder="email" name="email" class="form-control" value="{{Auth::user()->email}}" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" placeholder="password" name="password" class="form-control" value="">
                                </div>

                                <div class="form-group">
                                    <input type="file" placeholder="image" name="image" class="form-control" value="{{asset('images/'.Auth::user()->image)}}">
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
  </div>
</div>
@endsection
