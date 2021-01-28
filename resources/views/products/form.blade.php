@extends('layout')

@section('title', isset($product)? 'Update a ' . $product->name: 'Create a product')
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
            @if(isset($product))
                action="{{ route('products.update', $product) }}"
            @else
                action="{{ route('products.store') }}"
            @endif
            method="POST">
        <div class="col-6 mx-auto">
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name"
                       value="{{ old('name', isset($product)? $product->name:null) }}"
                       placeholder="Enter a name">
            </div>
            <div class="form-group mb-3">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price"
                       value="{{ old('price', isset($product)? $product->price:null) }}"
                       placeholder="Enter price">
            </div>
            <div class="form-group mb-3">
                <label for="count">Count:</label>
                <input type="number" min="1" class="form-control" id="count" name="count"
                       value="{{ old('count', isset($product)? $product->count:null) }}"
                       placeholder="Enter count of product">
            </div>
            <div class="form-group mb-3">
                <label for="category">Category:</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    @if(isset($product))
                        @foreach($product->category->all() as $category)
                            <option
                                {{ ($product->category->id == $category->id)? htmlspecialchars('selected'):null }}
                                value="{{ $category->id }}" >{{ $category->name }}
                            </option>
                        @endforeach
                    @else
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}" >{{ $category->name }}
                            </option>
                        @endforeach
                    @endif

                </select>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a description here" id="description" name="description" style="height: 100px">
                    {{ old('description', isset($product)? $product->description:null)  }}
                </textarea>
                <label for="description">Description</label>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif
    </form>
@endsection
