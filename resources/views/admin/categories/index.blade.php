@extends('admin.layouts.admin-app')

@section('appName', 'Categories - Index')
@section('content')
    <div class="container">
        <h3>List of all categories</h3>
        <a href="{{ route('categories.create') }}">Create new category</a>
        <div class="row justify-content-center">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category['id'] }}</th>
                        <td>{{ $category['name'] }}</td>
                        <td>
                            <div class="d-inline-flex">
                                <a href="{{ route('categories.edit', $category['id']) }}" class="btn btn-dark">Edit</a>

                                <form
                                    action="{{ route('categories.destroy', $category['id']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this category?')"
                                            href="">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
