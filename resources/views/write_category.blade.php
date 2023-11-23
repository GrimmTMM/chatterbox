@extends('templates.form')

@section('title', 'Write Category')

@section('action', 'category')

@section('form')
    <div class="form-group my-3">
        <input type="text" class="form-control" placeholder="Name..." name="name">
    </div>
    <div class="form-group my-3">
        <input type="submit" class="btn btn-primary btn-user btn-block w-100" value="Submit Category">
    </div>
@endsection

@section('errors')
    @isset($errors)
        @foreach ($errors as $error)
            <div class="alert alert-danger my-1">{{ $error }}</div>
        @endforeach
    @endisset
@endsection