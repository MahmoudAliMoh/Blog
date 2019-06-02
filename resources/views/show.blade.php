@extends('layouts.app')

@section('appName', 'Welcome')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-deck" style="width: 75%">
                <div class="card">
                    <img src="{{ asset('storage/'. $item['cover']) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="{{ route('home.show', $item['id']) }}"><h5 class="card-title">{{ $item['title'] }}</h5>
                        </a>
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
    </div>
@endsection
