@extends('admin.layouts.admin-app')

@section('appName', 'Categories - Update')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('categories.update', $category['id']) }}">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" name="name" value="{{ $category['name'] ?? old('name') }}" class="form-control" id="categoryName"
                               placeholder="Enter category name">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-light">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
