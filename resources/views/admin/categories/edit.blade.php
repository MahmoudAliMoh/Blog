@extends('layouts.app')

@section('appName', 'Categories - Update')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form method="POST" action="{{ route('categories.update') }}">
                @method('POST')
                @csrf

                <div class="form-group">
                    <label for="categoryName">Category Name</label>
                    <input type="text" name="name" class="form-control" id="categoryName" placeholder="Enter category name">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
