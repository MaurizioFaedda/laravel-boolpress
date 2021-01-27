@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1>{{ $post->title }}</h1>
                <p> {{ $post->content}}</p>
                <p>Category: <a href="{{ route('admin.categories.show', ['category' => $post->category_id]) }}">{{ $post->category ? $post->category->name : 'no category' }}</a></p>
                <div class="d-flex">
                    <a class="btn btn-warning mr-3" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">
                        Edit
                    </a>
                    <form class="" action="{{ route('admin.posts.destroy', ['post' =>$post->id])}}"  method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" name="button">
                        Delete
                    </button>

                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
