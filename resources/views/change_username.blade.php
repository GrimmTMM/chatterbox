@extends('templates.form')

@section('title', 'Change Username')

@section('action', 'change_username')

@section('form')
    <div class="form-group my-3">
        <input type="hidden" name="id" value="{{ $user->id }}">
        <input type="text" class="form-control" placeholder="Username..." name="username" value="{{ $user->username }}">
    </div>
    <div class="form-group my-3">
        <input type="submit" class="btn btn-primary btn-user btn-block w-100" value="Change Username">
    </div>
@endsection

@section('errors')
    @isset($errors)
        @foreach ($errors as $error)
            <div class="alert alert-danger my-1">{{ $error }}</div>
        @endforeach
    @endisset
@endsection