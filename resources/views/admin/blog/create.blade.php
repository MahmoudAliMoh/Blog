@extends('admin.layouts.admin-app')

@section('appName', 'Blog - Create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                    @method('POST')
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="title">Blog Title</label>
                        <input type="text" name="title" class="form-control" id="title"
                               placeholder="Enter blog title">
                    </div>

                    <div class="form-group">
                        <label for="content">Blog Title</label>
                        <textarea name="content" id="content" class="form-control"
                                  placeholder="Enter blog content"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="cover">Blog Cover</label>
                        <input type="file" name="cover" class="form-control" id="cover">
                    </div>

                    <div class="form-group">
                        <label for="categories">Categories</label>
                        <select name="category_id" class="form-control" id="categories">
                            <option selected disabled>Select category..</option>
                            @foreach($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-light">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
