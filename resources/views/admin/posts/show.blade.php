@extends('layouts.dashboard')

@section('content')
    <div class="container p-2">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1>{{ $post->title }}</h1>
                <p> {{ $post->content}}</p>
                <p>Category:
                     <a href="{{ $post->category ? route('admin.categories.show', ['category' => $post->category_id]) : '' }}">
                         {{ $post->category ? $post->category->name : '' }}
                     </a>
                 </p>
                <p>Tag:
                    @forelse ($post->tags as $tag)
                       {{ $tag->name }}{{ !$loop->last ? ',' : '' }}
                   @empty
                       -
                   @endforelse
                 </p>
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
