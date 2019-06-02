@extends('layouts.app')

@section('appName', 'Welcome')
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
            <div class="media" style="width: 70%; margin-top: 30px;">
                <div class="media-body">
                    <h5 class="mt-0">Media heading</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc
                    ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

            <div class="media" style="width: 70%; margin-top: 30px;">
                <div class="media-body">
                    <h5 class="mt-0">Media heading</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc
                    ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <div class="media" style="width: 70%; margin-top: 30px;">
                <div class="media-body">
                    <h5 class="mt-0">Media heading</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc
                    ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
        </div>

        <hr>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>
                    <div class="form-group">
                        <label for="comment">Email address</label>
                        <textarea name="comment" id="comment" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Comment</button>
                </form>
            </div>
        </div>
    </div>
@endsection
