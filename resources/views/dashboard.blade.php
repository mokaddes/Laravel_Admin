@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
<section class="content" style="width: 80%; margin: 0 auto; padding-top:50px;">
    @if ($message = Session::get('success'))
            <div class="alert alert-success" style="margin-top:20px">
                <p>{{ $message }}</p>
            </div>
        @endif
      <div class="container">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{ Auth::user()->count() }}</h3>

                    <p>User Registrations</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-user-plus"></i>
                  </div>
                  <a href="{{ route('users.index') }}" class="small-box-footer">Show users <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

          <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{count($posts)}}</h3>

                        <p>Post Here</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <a href="{{route('posts.index')}}" class="small-box-footer">Show posts <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{date('Y-m-d')}}</h3>

                    <p>Calendar</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-calendar"></i>
                  </div>
                  <a href="{{route('fullcalendar')}}" class="small-box-footer">See Full Calendar <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{App\Models\user::get('image')->count()}}</h3>

                  <p>Image Gallery</p>
                </div>
                <div class="icon">
                  <i class="fas fa-image"></i>
                </div>
                <a href="{{route('photos')}}" class="small-box-footer">See Photos <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
      </div><!-- /.container-fluid -->
</section>

@endsection

