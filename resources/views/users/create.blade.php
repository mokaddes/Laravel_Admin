@extends('layouts.master')
@section('title')
    New|User
@endsection
@section('content')

<div class="container" style="padding-top:50px">
  <div class="row">
    <div class="col-lg-12">
        <div class="pull-left btn btn-info">
            <h2> Create User</h2>
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
                          <form method="post" action="{{ route('users.store') }}" enctype='multipart/form-data'>
                          @csrf
                              <input type="hidden" value="{{csrf_token()}}" name="_token">
                              <div class="form-group">
                                  <label class="control-label">Name</label>
                                  <input type="text" class="form-control" name="name" required>
                              </div>

                              <div class="form-group">
                                  <label class="control-label">Email</label>
                                  <input type="email" class="form-control" name="email" required>
                              </div>

                              <div class="form-group">
                                  <label class="control-label">Password</label>
                                  <input type="password" class="form-control" name="password" required>
                              </div>
                              <div class="form-group">
                                    <label class="control-label">Profile Image</label>
                                    <input type="file" placeholder="image" name="image" class="form-control" onchange="previewFile" required>
                                    <img id="previewImg" style="width:100px;margin-top:20px">
                                </div>
                              <div class="form-group">
                                  <label class="control-label">Status</label>
                                  <select name="is_admin" id="" class="form-control">
                                    <option value="1">Admin</option>
                                    <option value="">User</option>
                                  </select>
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
