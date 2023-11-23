@extends('templates.dashboard')

@section('title', 'User List')

@section('content')
    <div class="row">

    </div>
    <div class="row">
        <table class="table">
            <tr class="thead-light">
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @if ($users->count() <= 0)
                <tr class="text-center">
                    <td colspan="3">No users to list</td>
                </tr>
            @endif
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="/remove_user/{{ $user->id }}"><button class="btn btn-danger btn-sm"><i class="fas fa-fw fa-walking"></i></button></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $users->links() }}
    </div>
@endsection