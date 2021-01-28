@extends('layout')

@section('title', isset($category)? 'Update a ' . $category->name: 'Create a category')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form
            @if(isset($category))
                action="{{ route('categories.update', $category) }}"
            @else
                action="{{ route('categories.store') }}"
            @endif
            method="POST">
        <div class="col-6 mx-auto">
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name"
                       value="{{ old('name', isset($category)? $category->name:null) }}"
                       placeholder="Enter a name">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif
    </form>
@endsection
