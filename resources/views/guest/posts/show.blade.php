@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">

                <h1>{{ $post->title }}</h1>
                <p>{{ $post->content}}</p>
                <p>Category: <a href="#">{{ $post->category ? $post->category->name : 'no category' }}</a></p>
            </div>
        </div>
    </div>
@endsection
