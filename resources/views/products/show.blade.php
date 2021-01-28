@extends('layout')

@section('title', 'Product ' . $product->name)
@section('content')
    <div class="col d-flex justify-content-center">
        <div class="card" style="width: 20rem;">
            <div class="card-header">
                Product
            </div>
            <ul class="list-group list-group-flush text-start">
                <li class="list-group-item">Name: {{ $product->name }}</li>
                <li class="list-group-item">Id: {{ $product->id }}</li>
                <li class="list-group-item">Price: {{ $product->price }}</li>
                <li class="list-group-item">Count: {{ $product->count }}</li>
                <li class="list-group-item">Category: {{ $product->category->name }}</li>
                <li class="list-group-item">Created: {{ $product->created_at->format('d/m/y h:i:s') }}</li>
                <li class="list-group-item">Updated: {{ $product->updated_at->format('d/m/y h:i:s') }}</li>
                <li class="list-group-item">Description: {{ $product->description }}</li>
            </ul>
            <form action="{{ route('products.destroy', $product) }}" method="POST">
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
