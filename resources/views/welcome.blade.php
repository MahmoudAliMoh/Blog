@extends('layouts.app')

@section('appName', 'Welcome')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-deck" style="width: 75%">
                @foreach($blog as $item)
                    <div class="col-md-12">
                        <div class="card">
                            <img src="{{ asset('storage/'. $item['cover']) }}" class="card-img-top">
                            <div class="card-body">
                                <a href="{{ route('home.show', $item['id']) }}"><h5 class="card-title">{{ $item['title'] }}</h5></a>
                                <p class="card-text">
                                    {{ str_limit($item['content'], $limit = 150, $end = '...') }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Category: {{ $item['categories']['data']['name'] }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
