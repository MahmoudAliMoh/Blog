@extends('admin.layouts.admin-app')

@section('appName', 'Blog - Index')
@section('content')
    <div class="container">
        <h3>List of all blog</h3>
        <a href="{{ route('blog.create') }}">Create new blog</a>
        <div class="row justify-content-center">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blog as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td>{{ $item['title'] }}</td>
                        <td>
                            <div class="d-inline-flex">
                                <a href="{{ route('blog.edit', $item['id']) }}" class="btn btn-dark">Edit</a>

                                <form
                                    action="{{ route('blog.destroy', $item['id']) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this blog?')">
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
