@extends('templates.dashboard')

@section('title', $chatter->title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <p class="h4 text-gray-900 mb-2">{{ $chatter->title }}</p>
                                        <p class="text-gray-900">{{ $chatter->user->username }} - {{ $chatter->created_at->format('M Y, H:i:s') }}</p>
                                        <p class="mb-4 text-left">
                                            {{ $chatter->content }}
                                        </p>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <a href="/edit_chatter/{{ $chatter->id }}"><button class="btn btn-warning btn-sm"><i class="fas fa-fw fa-pencil-alt"></i></button></a>
                                    <a href="/delete_chatter/{{ $chatter->id }}"><button class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-5">
            <form class="d-none d-sm-inline-block form-inline col-lg-10" method="post" action="/write_reply">
                @csrf
                <div class="input-group">
                    <input type="hidden" value="{{ $chatter->id }}" name="chatter_id">
                    <input type="text" class="form-control" placeholder="Reply..." name="content">
                    <input type="submit" class="btn btn-primary" value="Post Reply">
                </div>
            </form>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-xl-10 col-lg-12 col-md-9">
                @if ($replies->count() <= 0)
                    <div class="text-center">Be the first to reply</div>
                @endif
                @foreach ($replies as $reply)
                        <div class="card o-hidden border-0 shadow-lg my-1 p-1">
                            {{ $reply->user->username }} - {{ $reply->created_at->format('M Y, H:i:s') }}<br>
                            {{ $reply->content }}<br>
                            @if ($reply->user->id == session('id'))
                                <a href="/delete_reply/{{ $reply->id }}"><button class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button></a>
                            @endif
                        </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection