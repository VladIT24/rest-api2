@extends('layout')

@section('title', 'Category ' . $category->name)
@section('content')
    <div class="col d-flex justify-content-center">
        <div class="card" style="width: 20rem;">
            <div class="card-header">
                Category
            </div>
            <ul class="list-group list-group-flush text-start">
                <li class="list-group-item">Name: {{ $category->name }}</li>
                <li class="list-group-item">Id: {{ $category->id }}</li>
                <li class="list-group-item">Created: {{ $category->created_at->format('d/m/y h:i:s') }}</li>
                <li class="list-group-item">Updated: {{ $category->updated_at->format('d/m/y h:i:s') }}</li>
            </ul>
            <div class="dropdown">
                <a class="btn btn-light dropdown-toggle list-group-item " href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Has products:
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($category->products as $product)
                        <li><a class="dropdown-item list-group-" href="{{ route('products.show', $product) }}">{{ $product->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
