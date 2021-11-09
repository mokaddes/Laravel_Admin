@extends('layouts.master')
@section('title')
    Users
@endsection
@section('content')
<section class="content" style="padding-top:50px">
    <div class="container">
        <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left btn btn-info">
                        <h2>User List</h2>
                    </div>
                    <div class="pull-right">
                        @if(Auth::user()->is_admin == 1)
                        <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Users</a>
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

        <table class="table table-bordered text-center" style="margin-top: 20px;">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <button class="btn btn-default">
                    @if($user->is_admin == 1)
                        Admin
                    @else
                        User
                    @endif
                    </button>
                </td>
                <td>
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                        @if(Auth::user()->is_admin == 1)

                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endif
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</section>
{!! $users->links() !!}
@endsection
