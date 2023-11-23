@extends('templates.form')

@section('title', 'Write Chatter')

@section('action', 'chatter')

@section('form')
    <div class="form-group my-3">
        <input type="text" class="form-control" placeholder="Title..." name="title">
    </div>
    <div class="form-group my-3">
        <textarea class="form-control" placeholder="Content..." name="content"></textarea>
    </div>
    <div class="form-group my-3">
        <select class="form-control" name="category">
            <option value="">Select category...</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group my-3">
        <input type="submit" class="btn btn-primary btn-user btn-block w-100" value="Write Chatter">
    </div>
@endsection

@section('errors')
    @isset($errors)
        @foreach ($errors as $error)
            <div class="alert alert-danger my-1">{{ $error }}</div>
        @endforeach
    @endisset
@endsection