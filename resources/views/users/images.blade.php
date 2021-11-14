@extends('layouts.master')
@section('title')
    Image Gallery
@endsection
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="pull-left btn btn-info">
                        Gallery
                    </div>
                    <div class="pull-right">
                        <a href="{{route('dashboard')}}" class="btn btn-info">Back</a>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    @foreach ($photos as $user)
                    <div class="responsive">
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a href="/images/{{ $user->image }}" class="fancybox" rel="ligthbox" target="_blank">
                                <img  src="/images/{{ $user->image }}" class="zoom img-fluid "  alt="">
                                <figcaption class="form-control">{{ $user->name }}</figcaption>
                            </a>
                        </div>
                        {{-- <div class="col-md-2" style="padding-top: 10px">
                            <img src="/images/{{ $user->image }}" style="padding-top: 10px">
                            <figcaption class="form-control">{{ $user->name }}</figcaption>
                        </div> --}}
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
