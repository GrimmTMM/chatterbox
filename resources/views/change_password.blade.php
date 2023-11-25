@extends('templates.form')

@section('title', 'Change Password')

@section('action', 'change_password')

@section('form')
    <div class="form-group my-3">
        <input type="hidden" name="id" value="{{ $user->id }}">
        <input type="password" class="form-control" placeholder="New Password..." name="new_password">
    </div>
    <div class="form-group my-3">
        <input type="password" class="form-control" placeholder="Confirm New Password..." name="new_confirm">
    </div>
    <div class="form-group my-3">
        <input type="password" class="form-control" placeholder="Old Password..." name="old_password">
    </div>
    <div class="form-group my-3">
        <input type="submit" class="btn btn-primary btn-user btn-block w-100" value="Change Password">
    </div>
@endsection

@section('errors')
    @isset($errors)
        @foreach ($errors as $error)
            <div class="alert alert-danger my-1">{{ $error }}</div>
        @endforeach
    @endisset
@endsection