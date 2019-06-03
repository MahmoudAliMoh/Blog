@extends('layouts.app')

@section('appName', $item['title'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-deck" style="width: 75%">
                <div class="card">
                    <img src="{{ asset('storage/'. $item['cover']) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['title'] }}</h5>
                        <p class="card-text">
                            {{ $item['content'] }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Category: {{ $item['categories']['data']['name'] }}</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            @forelse($item['comments']['data'] as $comment)
                <div class="media" style="width: 70%; margin-top: 30px;">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $comment['user_name'] }}</h5>
                        {{ $comment['comment'] }}
                    </div>
                </div>
            @empty
                <h5>No comments added on this post</h5>
            @endforelse

        </div>

        <hr>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(auth()->check())
                    <form method="post" action="{{ route('comments.store', $item['id']) }}">
                        @method('POST')
                        @csrf
                        <h5>Add your comment</h5>
                        @include('flash::message')

                        <div class="form-group">
                            <label for="comment">Email address</label>
                            <textarea name="comment" id="comment" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>
                @else
                    <h5>You need to be logged in to add comments, login from <a href="{{ route('login') }}">here</a>
                    </h5>
                @endif
            </div>
        </div>
    </div>
@endsection
