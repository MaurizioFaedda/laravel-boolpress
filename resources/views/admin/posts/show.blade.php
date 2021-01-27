@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1>{{ $post->title }}</h1>
                <p> {{ $post->content}}</p>
                <p>Category: <a href="{{ route('admin.categories.show', ['category' => $post->category_id]) }}">{{ $post->category ? $post->category->name : 'no category' }}</a></p>
            </div>
        </div>
    </div>
@endsection
