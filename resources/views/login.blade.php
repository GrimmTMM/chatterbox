@extends('templates.auth')

@section('title', 'Login')

@section('action', 'login')

@section('form')
    <div class="form-group my-3">
        <input type="text" class="form-control form-control-user" placeholder="Username..." name="username">
    </div>
    <div class="form-group my-3">
        <input type="password" class="form-control form-control-user" placeholder="Password..." name="password">
    </div>
    <div class="form-group my-3">
        <input type="submit" class="btn btn-primary btn-user btn-block w-100" value="Login">
    </div>
@endsection

@section('linker')
    <div class="text-center">
        <a class="small" href="/register">Create an Account!</a>
    </div>
@endsection

@section('errors')
    @isset($errors)
        @foreach ($errors as $error)
            <div class="alert alert-danger my-1">{{ $error }}</div>
        @endforeach
    @endisset
@endsection
