@extends('layouts.master')
@section('title')
    Posts
@endsection
@section('content')
<section class="content">
    <div class="container" style="padding-top: 30px">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 margin-tb">
                <div class="pull-left btn btn-info">
                    Posts
                </div>
                <div class="pull-right">
                    @if (Auth::user()->is_admin == 1)
                        <a href="{{route('posts.create')}}" class="btn btn-success">Create New Post</a>
                    @endif
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" style="margin-top:20px">
                <p>{{ $message }}</p>
            </div>
            @endif
            @if ($message = Session::get('delete'))
                <div class="alert alert-danger" style="margin-top:20px">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($notify = Session::get('notify'))
                <div class="alert alert-danger" style="margin-top:20px">
                    <p>{{ $notify }}</p>
                </div>
            @endif
        <div class="row">
            <table class="table table-bordered text-center" style="margin-top: 20px">
                <thead class="table-header">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($posts as $post)
                <tbody>
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{Str::limit($post->title, 30, '...')}}</td>
                        <td>{{Str::limit($post->detail, 30, '...')}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>
                            <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                <a href="{{ route('posts.show',$post->id) }}" class="btn btn-info">Show</a>
                                @if (Auth::user()->is_admin == 1)
                                @if (Auth::user() == $post->user)
                                <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                                @endif

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</section>
@endsection
