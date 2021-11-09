@extends('layouts.master')
@section('title')
    Edit|User
@endsection
@section('content')
<div class="container" style="padding-top:50px">
  <div class="row">
    <div class="col-lg-12">
        <div class="pull-left btn btn-info">
             Update Profile
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
                          <form action="{{route('users.update', $users->id)}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')
                                <div class="form-group">
                                <label class="control-label">Name</label>
                                    <input type="text" placeholder="name" name="name" class="form-control" value="{{$users->name}}" required>
                                </div>

                                <div class="form-group">
                                <label class="control-label">Email</label>
                                    <input type="email" placeholder="email" name="email" class="form-control" value="{{$users->email}}" required>
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Status</label>
                                  <select name="is_admin" id="" class="form-control">
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                  </select>
                              </div>

                                <div class="form-group">
                                <label class="control-label">Password</label>
                                    <input type="password" placeholder="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label">User Image</label>
                                    <input type="file" name="image" id="image" class="form-control" value="{{$users->image}}">
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
