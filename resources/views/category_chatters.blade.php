@extends('templates.dashboard')

@section('title', 'chatters')

@section('content')
    <div class="row mx-1">
        Current Category: {{ $category }}
    </div>
    <div class="row my-3">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post" action="/search_category">
            @csrf
            <div class="input-group">
                <select class="form-control" name="category">
                    <option value="">Select category...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <input class="btn btn-primary" type="submit" value="Search by category">
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        @if ($chatters->count() <= 0)
            <p class="mx-auto my-5">There are no chatter yet</p>
        @endif
        @foreach ($chatters as $chatter)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $chatter->title }}</div>
                                <div class="text-xs font-weight-bold mb-1">
                                    @if (strlen($chatter->content) > 180)
                                        {{ substr($chatter->content, 0, 144) }}...
                                    @else
                                        {{ $chatter->content }}
                                    @endif
                                </div>
                                {{ $chatter->user->username }} - {{ $chatter->created_at->format('M Y, H:i:s') }}<br>
                                👁 - {{ $chatter->views }}<br>
                                <a href="/chatter/{{ $chatter->id }}"><button class="btn btn-primary btn-sm"><i class="fas fa-fw fa-eye"></i></button></a>
                                @if ($chatter->user->id == session('id'))
                                    <a href="/delete_chatter/{{ $chatter->id }}"><button class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        {{ $chatters->links() }}
    </div>
@endsection