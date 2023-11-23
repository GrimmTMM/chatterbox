@extends('templates.form')

@section('title', 'Edit Category')

@section('action', 'edit_category')

@section('form')
    <div class="form-group my-3">
        <input type="hidden" value="{{ $category->id }}" name="id">
        <input type="text" class="form-control" placeholder="Name..." value="{{ $category->name }}" name="name">
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