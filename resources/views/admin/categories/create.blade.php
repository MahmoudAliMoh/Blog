@extends('layouts.app')

@section('appName', 'Categories - Create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('categories.store') }}">
                    @method('POST')
                    @csrf

                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" name="name" class="form-control" id="categoryName"
                               placeholder="Enter category name">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-light">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
