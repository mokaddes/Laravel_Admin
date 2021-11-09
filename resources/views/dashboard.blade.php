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
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
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
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>

                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        <div class="row">

        </div>
      </div><!-- /.container-fluid -->
</section>

{{-- <div class="container">
    Hi <strong>{{ Auth::user()->name }} </strong>! Are you admin?? then
    <br>
    @if(Auth::user()->is_admin === 1)
    <a href="/home">
        <button class="btn btn-link" >Click Here</button>
    </a>
    @endif --}}
@endsection

