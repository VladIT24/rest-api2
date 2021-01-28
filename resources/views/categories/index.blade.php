@extends('layout')

@section('title', 'Categories list')
@section('content')
    <a class="btn btn-primary" href="{{ route('categories.create') }}">Add a category</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></td>
                <td>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
