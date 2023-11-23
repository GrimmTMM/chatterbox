@extends('templates.dashboard')

@section('title', 'Category List')

@section('content')
    <div class="row">

    </div>
    <div class="row">
        <table class="table">
            <tr class="thead-light">
                <th>Name</th>
                <th>Action</th>
            </tr>
            @if ($categories->count() <= 0)
                <tr class="text-center">
                    <td colspan="2">No categories to list</td>
                </tr>
            @endif
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="/edit_category/{{ $category->id }}"><button class="btn btn-warning btn-sm"><i class="fas fa-fw fa-pencil-alt"></i></button></a>
                        <a href="/delete_category/{{ $category->id }}"><button class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $categories->links() }}
    </div>
@endsection