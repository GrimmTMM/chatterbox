@extends('templates.auth')

@section('title', 'Register')

@section('action', 'register')

@section('form')
    <div class="form-group my-3">
        <input type="email" class="form-control form-control-user" placeholder="Email..." name="email">
    </div>
    <div class="form-group my-3">
        <input type="text" class="form-control form-control-user" placeholder="Username..." name="username">
    </div>
    <div class="form-group my-3">
        <input type="password" class="form-control form-control-user" placeholder="Password..." name="password">
    </div>
    <div class="form-group my-3">
        <input type="password" class="form-control form-control-user" placeholder="Confirm password..." name="confirm">
    </div>
    <div class="form-group my-3">
        <input type="submit" class="btn btn-primary btn-user btn-block w-100" value="Register">
    </div>
@endsection

@section('linker')
    <div class="text-center">
        <a class="small" href="/login">Login to an Account!</a>
    </div>
@endsection

@section('errors')
    @isset($errors)
        @foreach ($errors as $error)
            <div class="alert alert-danger my-1">{{ $error }}</div>
        @endforeach
    @endisset
@endsection
